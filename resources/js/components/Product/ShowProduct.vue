<template>

    <ModalWindow>

        <div class="product-card-header">
            <h5>{{ product.name }}</h5>
            <div class="icons">
                <img
                    @click="edit()"
                    class="img-icon"
                    src="../../../img/edit_icon.svg"
                    alt="Edit icon">
                <img
                    @click="deleteProduct(product.id)"
                    class="img-icon"
                    src="../../../img/delete_icon.svg"
                    alt="Delete icon">
            </div>
        </div>

        <div class="product-card">

            <div class="info">
                <div class="name">
                    <span>Артикул</span>
                </div>
                <span>{{ product.article }}</span>
            </div>

            <div class="info">
                <div class="name">
                    <span>Название</span>
                </div>
                <span>{{ product.name }}</span>
            </div>

            <div class="info">
                <div class="name">
                    <span>Статус</span>
                </div>
                <span>{{ getStatusLabel(product.status).name }}</span>
            </div>

            <div class="info">
                <div class="name">
                    <span>Атрибуты</span>
                </div>
                <span>
                    <template v-for="(value, attribute) in product.data">{{ attribute }}: {{ value }} <br> </template>
                </span>
            </div>

        </div>
    </ModalWindow>

</template>

<script>
import ModalWindow from "./Main/Modal/ModalWindow.vue";

export default {
    name: "ShowProduct.vue",
    components: {ModalWindow},

    emits: ['edit'],

    props: {
        product: Object,
        getProducts: Function,
        getStatusLabel: Function
    },

    methods: {
        deleteProduct() {
            axios.delete(`/api/products/${this.product.id}`)
                .then(() => {
                    this.getProducts()
                    this.$emit('close')
                })
        },

        edit() {
            this.$emit('edit', {product: this.product})
        }
    }
}
</script>

<style scoped>

.product-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

h5 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #FFFFFF;
    word-wrap: break-word;
    max-width: 350px;
}

.product-card {
    width: 530px;
    display: flex;
    flex-direction: column;
}

.info {
    display: flex;
    flex-direction: row;
    margin-bottom: 20px;

    font-size: 12px;
    font-weight: 400;
    color: #FFFFFF;
}

.name {
    width: 60px;
    margin-right: 30px;
    word-wrap: break-word;
}

.name span {
    opacity: 0.7;
}

.icons {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-right: 30px;
}

.img-icon {
    cursor: pointer;
    margin-right: 5px;
}

</style>
