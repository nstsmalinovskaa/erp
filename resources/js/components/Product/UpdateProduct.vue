<template>
    <ModalWindow>
        <div class="form-create">
            <h5>Редактирование продукта</h5>
            <label for="article">Артикул</label>
            <input v-model="editedProduct.article" type="text" id="article" name="article" required>
            <label for="name">Название</label>
            <input v-model="editedProduct.name" type="text" id="name" name="name" required>
            <label for="status">Статус</label>
            <div class="select">
                <div class="v-select">
                    <div class="v-select-header">
                        <p class="title">{{ status.name }}</p>
                        <img @click="isStatusOptionsVisible = !isStatusOptionsVisible"
                             src="../../../img/expand_down.svg">
                    </div>
                    <div v-if="isStatusOptionsVisible" class="options">
                        <p v-for="option in statuses" @click=selectStatus(option)>{{ option.name }}</p>
                    </div>
                </div>
            </div>

            <div class="attributes">
                <h5>Атрибуты</h5>
                <div class="attr-group" v-for="(attribute, index) in attributes" :key="index">
                    <div class="name-atr">
                        <label for="name">Название</label>
                        <label for="name">Значение</label>
                    </div>
                    <div class="attribute-group">
                        <input v-model="attribute.name" type="text" required>
                        <input v-model="attribute.value" type="text" required>
                        <img @click="removeAttribute(index)" class="delete-attribute" src="../../../img/attribute.svg">
                    </div>
                </div>
                <a @click="addAttribute" class="add-attr"> + Добавить атрибут</a>
            </div>

            <button @click="updateProduct" class="button-form" type="submit">Добавить</button>
        </div>
    </ModalWindow>

</template>

<script>
import ModalWindow from "../ModalWindow.vue";

export default {
    name: "UpdateProduct.vue",
    components: {ModalWindow},

    props: {
        product: Object,
        getStatusLabel: Function,
        getProducts: Function
    },

    data() {
        return {
            statuses: [
                {name: "Доступен", value: 'available'},
                {name: "Не доступен", value: 'unavailable'},
            ],
            isStatusOptionsVisible: false,
            status: this.getStatusLabel(this.product.status),
            attributes: [],
            editedProduct: { article: "", name: "", status: "", data: ""}
        }
    },

    created() {
        this.convertAttributestoArr()
        this.createEditProduct()
    },


    methods: {
        updateProduct() {
            axios.patch(`/api/products/${this.editedProduct.id}`, {
                article: this.editedProduct.article,
                name: this.editedProduct.name,
                status: this.editedProduct.value,
                data: this.submitAttributes(),
            })
                .then(res => {
                    this.getProducts();
                    this.$emit('close')
                })
        },
        selectStatus(option) {
            this.status = option;
            this.isStatusOptionsVisible = false
        },

        addAttribute() {
            this.attributes.push({ name: "", value: "" });
        },
        removeAttribute(index) {
            this.attributes.splice(index, 1);
        },
        submitAttributes() {
            let dataToSend = {};
            this.attributes.forEach(attribute => {
                dataToSend[attribute.name] = attribute.value;
            });
            return dataToSend
        },
        convertAttributestoArr() {
            for (const [attribute, value] of Object.entries(this.editedProduct.data) ) {

                this.attributes.push({name: attribute, value: value })
            }
        },
        createEditProduct() {
            for (let key in this.product) {
                this.editedProduct[key] = this.product[key];
            }
        }

    }
}
</script>

<style scoped>

.form-create {
    display: flex;
    flex-direction: column;
}

h5 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 30px;
}

label {
    display: block;
    margin-bottom: 8px;

    font-size: 10px;
    font-weight: 400;
}

input {
    width: 450px;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;

    font-size: 10px;
    font-weight: 400;
}

.select {

}

.v-select {
    width: 450px;
    padding: 7px;
    margin-bottom: 15px;
    border-radius: 5px;
    background-color: #FFFFFF;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;

    font-size: 10px;
    color: #000;
    font-weight: 400;
}

.title {
    align-self: center;


    font-size: 10px;
    font-weight: 400;
}

.v-select-header {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.v-select-header img {
    cursor: pointer;
}

.options {
    position: absolute;
    margin-top: 26px;
    background-color: #FFFFFF;
    border-radius: 5px;
}

.options p {
    padding: 10px;

    width: 450px;
    background-color: #FFFFFF;
    border-radius: 5px;


    font-size: 10px;
    font-weight: 400;
}

.options p:hover {
    background-color: #50A9FC;
}

.attributes h5 {
    font-size: 14px;
    margin-bottom: 18px;
}

.attribute-group {
    width: 450px;
    display: flex;
    align-items: center;
}

.name-atr {
    width: 450px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.name-atr label:last-child {
    margin-right: 182px;
}

.attribute-group input {
    flex: 1;
    margin-right: 10px;
}

.delete-attribute {
    cursor: pointer;
    margin-bottom: 8px;
}

.add-attr {
    color: #0FC5FF;
    font-size: 10px;
    text-decoration: none;
    border-bottom: 1px dashed #0FC5FF;
    cursor: pointer;
    width: 100px;
}

.add-attr:hover {
    color: #0EAADC;
}

.button-form {
    width: 136px;
    height: 30px;
    background-color: #0FC5FF;

    color: white;
    font-weight: 500;
    font-size: 12px;

    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
}

.button-form:hover {
    background: #0EAADC;
}

</style>
