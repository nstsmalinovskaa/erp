<template>

        <div class="sidebar">
            <div class="sidebar-logo">
                <div class="logo">
                    <img src="../../img/logo.svg" alt="Logotip Enterprise Resource Planing">
                </div>
                <span>Enterprise <br> Resource <br> Planning</span>
            </div>
            <nav class="sidebar-nav nav">
                <ul class="nav-list">
                    <li>
                        <a href="#">Продукты</a>
                    </li>
                </ul>
            </nav>
        </div>

        <main class="main">
            <header class="header">
                <div class="header-links">
                    <nav class="nav-header">
                        <ul class="nav-header-list">
                            <li class="nav-header-link-text active">
                                <a href="#">ПРОДУКТЫ</a>
                            </li>
                            <!-- <li class="nav-header-link-text"><a href="#">Категории</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="user-info">
                    <a href="#">Имя Пользователя</a>
                </div>
            </header>

            <IndexProduct/>
        </main>
</template>

<script>

import IndexProduct from "./Product/IndexProduct.vue";


export default {
    name: "App.vue",
    components: {IndexProduct},

}
</script>

<style scoped>

</style>
