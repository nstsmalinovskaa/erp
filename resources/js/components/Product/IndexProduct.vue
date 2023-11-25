<template>
    <div class="content">
        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>АРТИКУЛ</th>
                    <th>НАЗВАНИЕ</th>
                    <th>СТАТУС</th>
                    <th>АТРИБУТЫ</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product in products" @click="openProduct(product)">
                    <td>{{ product.name }}</td>
                    <td>{{ product.article }}</td>
                    <td>{{ getStatusLabel(product.status).name }}</td>
                    <td>
                        <template v-for="(value, attribute) in product.data">
                            {{ attribute }}: {{ value }} <br>
                        </template>
                    </td>
                    <teleport to="body">
                        <ShowProduct
                            v-if="product.openProduct"
                            :product=product
                            :getProducts="getProducts"
                            :getStatusLabel="getStatusLabel"
                            @close="closeProduct(product)"
                            @edit="openUp(product)"
                        />
                    </teleport>
                </tr>
                </tbody>
            </table>
        </div>
        <button class="button-add" type="submit" @click="isModalOpen = true">Добавить</button>
        <teleport to="body">
            <UpdateProduct
                v-if="isUpdateProductVisible"
                :product="updatedProduct"
                :getStatusLabel="getStatusLabel"
                :getProducts="getProducts"
                @close="closeUpdateProduct"
            />
        </teleport>
        <teleport to="body">
            <CreateProduct :getProducts="getProducts" v-if="isModalOpen" @close="isModalOpen = false"/>
        </teleport>
    </div>
</template>

<script>
import CreateProduct from "../CreateProduct.vue";
import ShowProduct from "./ShowProduct.vue";
import UpdateProduct from "./UpdateProduct.vue";
import data from "bootstrap/js/src/dom/data.js";

export default {
    name: "IndexProduct.vue",
    components: {UpdateProduct, ShowProduct, CreateProduct},

    data() {
        return {
            isModalOpen: false,
            isUpdateProductVisible: false,
            updatedProduct: null,
            products: [],
        }
    },

    mounted() {
        this.getProducts()
    },

    methods: {
        getProducts() {
            axios.get('/api/products')
                .then(res => {
                    this.products = res.data.data
                })
        },
        openProduct(product) {
            this.products.forEach((p) => (p.openProduct = false));
            product.openProduct = true;
        },

        closeProduct(product) {
            product.openProduct = false;
        },

        getStatusLabel(status) {
            const statuses = [
                {name: "Доступен", value: 'available'},
                {name: "Не доступен", value: 'unavailable'},
            ]

            return statuses.find((option) => option.value.includes(status)) || status
        },

        openUp(product) {
            this.updatedProduct = product;
            this.isUpdateProductVisible = true;
            this.closeProduct(product)
        },

        closeUpdateProduct(product) {
            this.isUpdateProductVisible = false;
        },
    },


}
</script>

<style scoped>

.content {
    width: auto;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

/* Table */
.table-container {
    width: 800px;
}

.table {
    width: 100%;
    border: none;
    margin-bottom: 20px;
    border-collapse: collapse;
    table-layout: fixed;
    color: #6E6E6F;
    font-weight: 400;
}

.table thead th {
    padding: 20px;

    font-size: 12px;
    font-weight: 400;
    line-height: 10px;
    text-align: left;

    border-bottom: 2px solid #374050;
}

.table tbody td {
    padding: 20px;
    font-size: 14px;
    line-height: 30px;
    text-align: left;
    border-bottom: 2px solid #374050;
    background-color: #FFFFFF;
    margin-left: 0;
    max-width: 200px;
    white-space: normal;
    word-wrap: break-word;
    cursor: pointer;
}

.table tbody tr:hover {
    color: #374050;
}

/* Button Add*/
.button-add {
    width: 136px;
    height: 30px;
    background-color: #0FC5FF;

    color: white;
    font-weight: 500;
    font-size: 12px;

    border: none;
    border-radius: 6px;

    cursor: pointer;
    float: right;

    margin-top: 15px;
    margin-right: 20px;
}

.button-add:hover {
    background: #0EAADC;
}
</style>
