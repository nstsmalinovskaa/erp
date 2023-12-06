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
                    <td>{{ product.article }}</td>
                    <td>{{ product.name }}</td>
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
            <button class="button-add" type="submit" @click="isModalOpen = true">Добавить</button>
        </div>

        <div class="pagination" v-if="pagination.last_page > 1">
            <ul>
                <li v-if="pagination.current_page !== 1">
                    <img @click="getProducts(pagination.current_page - 1)"
                         src="../../../img/left.svg">
                </li>
                <li v-for="link in pagination.links">
                    <template v-if="Number(link.label) &&
                            (pagination.current_page - link.label < 2 &&
                            pagination.current_page - link.label > -2) ||
                            Number(link.label) === 1 ||  Number(link.label) === pagination.last_page">
                        <a @click.prevent="getProducts(link.label)" :class="{ 'active': link.active }"
                           href="#0">{{ link.label }}</a>
                    </template>
                    <template v-if="Number(link.label) &&
                            pagination.current_page !== 3 &&
                            (pagination.current_page - link.label === 2) ||
                            Number(link.label) &&
                            pagination.current_page !== pagination.last_page - 2 &&
                            (pagination.current_page - link.label === -2)">
                        <a>...</a>
                    </template>
                </li>
                <li v-if="pagination.current_page !== pagination.last_page">
                    <img @click="getProducts(pagination.current_page + 1)"
                         src="../../../img/right.svg">
                </li>
            </ul>
        </div>

        <teleport to="body">
            <UpdateProduct
                v-if="isUpdateProductVisible"
                :product="updatedProduct"
                :getStatusLabel="getStatusLabel"
                :getProducts="getProducts"
                :role="role"
                @close="closeUpdateProduct"
            />
        </teleport>
        <teleport to="body">
            <CreateProduct
                :getProducts="getProducts"
                v-if="isModalOpen"
                @close="isModalOpen = false"/>
        </teleport>
    </div>

</template>

<script>
import CreateProduct from "./CreateProduct.vue";
import ShowProduct from "./ShowProduct.vue";
import UpdateProduct from "./UpdateProduct.vue";

export default {
    name: "IndexProduct.vue",
    components: {UpdateProduct, ShowProduct, CreateProduct},

    data() {
        return {
            isModalOpen: false,
            isUpdateProductVisible: false,
            updatedProduct: null,
            products: [],
            pagination: []
        }
    },

    props: {
        role: String
    },

    mounted() {
        this.getProducts()
    },

    methods: {
        getProducts(page = 1) {
            axios.get(`/api/products?page=${page}`)
                .then(res => {
                    this.products = res.data.data
                    this.pagination = res.data.meta
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
    flex-direction: column;
    align-items: flex-start;
}

.table-container {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-direction: row;
}

.table {
    width: 800px;
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

.pagination {
    width: 800px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.pagination img {
    cursor: pointer;
}

.pagination ul {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.pagination li {
    margin-right: 12px;

    font-size: 16px;
    color: #C4C4C4;
    opacity: 0.7;
    font-weight: 400;
}

.pagination a.active {
    font-weight: bold;
    color: #6c757d;
    opacity: 0.7;
}

</style>
