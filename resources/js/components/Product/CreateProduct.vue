<template>
    <ModalWindow>
        <Form class="form-create" @submit="addProduct">
            <h5>Добавление продукта</h5>

            <label for="article">Артикул</label>
            <Field class="field-input" v-model="article" type="text" id="article" name="article" :rules="articleRules"
                   @input="resetUniqueArticle"/>
            <ErrorMessage class="error" name="article"/>
            <span v-if="uniqueArticle" class="error">Артикул должен быть уникалным</span>

            <label for="name">Название</label>
            <Field class="field-input" v-model="name" type="text" id="name" name="name" :rules="nameRules"/>
            <ErrorMessage class="error" name="name"/>

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

            <button class="button-form" type="submit">Добавить</button>
        </Form>
    </ModalWindow>
</template>

<script>
import ModalWindow from "./Main/Modal/ModalWindow.vue";
import {Field, Form, ErrorMessage} from 'vee-validate';

export default {
    name: "CreateProduct.vue",
    components: {ModalWindow, Form, Field, ErrorMessage},

    data() {
        return {
            article: null,
            name: null,
            statuses: [
                {name: "Доступен", value: 'available'},
                {name: "Не доступен", value: 'unavailable'},
            ],
            isStatusOptionsVisible: false,
            status: null,
            attributes: [],
            uniqueArticle: false
        }
    },

    created() {
        this.status = this.statuses[0];
    },

    props: {
        getProducts: Function
    },

    methods: {

        addProduct() {
            axios.post('/api/products', {
                article: this.article,
                name: this.name,
                status: this.status.value,
                data: this.submitAttributes(),
            })
                .then(res => {
                    this.status = this.statuses[0]
                    this.getProducts();
                    this.$emit('close')
                })
                .catch(errors => {
                    if (errors.response.data.message === "The article has already been taken.") {
                        this.uniqueArticle = true
                    }
                })
        },

        articleRules(value) {
            if (!value) {
                return 'Обязательное поле'
            }
            if (!/^[a-zA-Z0-9]+$/.test(value)) {
                return 'Поле должно содержать только латинские символы и цифры'
            }
            return true
        },

        resetUniqueArticle() {
            this.uniqueArticle = false;
        },

        nameRules(value) {
            if (!value) {
                return 'Обязательное поле'
            }
            if (value.length < 10) {
                return 'Минимальное значение 10 символов'
            }
            return true
        },

        selectStatus(option) {
            this.status = option;
            this.isStatusOptionsVisible = false
        },

        addAttribute() {
            this.attributes.push({name: "", value: ""});
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

.field-input, input {
    width: 450px;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;

    font-size: 10px;
    font-weight: 400;
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

.error {
    margin-bottom: 20px;
    margin-left: 5px;

    opacity: 0.5;
    font-size: 10px;
}

</style>
