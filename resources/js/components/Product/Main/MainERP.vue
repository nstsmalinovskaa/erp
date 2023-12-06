<template>

    <div class="sidebar">
        <div class="sidebar-logo">
            <div class="logo">
                <img src="../../../../img/logo.svg" alt="Logotip Enterprise Resource Planing">
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
                <a href="#">{{ role }}</a>
            </div>
        </header>

        <IndexProduct :role="role"/>
    </main>

</template>

<script>
import IndexProduct from "../IndexProduct.vue";

export default {
    name: "MainERP",
    components: {IndexProduct},

    data() {
        return {
            role: null
        }
    },

    mounted() {
        this.getRole()
    },

    methods: {
        getRole() {
            axios.get('api/auth')
                .then(res => {
                    if (res.data !== 'admin') {
                        this.role = 'Пользователь'
                    } else {
                        this.role = 'Администратор'
                    }
                })
        },
    }
}
</script>

<style scoped>

.sidebar {
    width: 180px;
    min-height: 100vh;

    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;

    background-color: #374050;
}

.sidebar-logo {
    margin-bottom: 20px;
    display: flex;
    align-items: flex-start;
}

.sidebar-logo span {
    font-weight: 400;
    font-size: 12px;
    color: #FFFFFF;

    margin-left: 12px;
    margin-top: 10px;
}

.nav-list {
    padding-left: 30px;
    font-size: 14px;
}

.nav-list li {
    margin-bottom: 30px;
}

.nav-list a {
    font-weight: 400;
    color: #FFFFFF;
    opacity: 0.7;
    transition: color 0.2s ease-in;
}

.nav-list a:hover {
    color: #FFFFFF;
    opacity: 1;
}

.main {
    display: flex;
    flex-direction: column;
    align-items: stretch;

    width: 100%;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    column-gap: 30px;
    height: 60px;
    background-color: #FFFFFF;
}

.nav-header {
    font-size: 12px;
    font-weight: 400;
    margin-left: 20px;
}

.nav-header-list {
    display: flex;
    align-items: center;
}

.nav-header-link-text {
    position: relative;

    color: #000;
}

.nav-header-link-text:hover {
    color: #ED1C24;

}

.nav-header-link-text.active {
    color: #ED1C24;
}

.nav-header-link-text::after {
    position: absolute;
    left: 0;
    width: 0%;
    bottom: -10px;

    content: "";
    display: block;
    height: 2px;
    background-color: #ED1C24;

    transition: width 0.2s ease-in;
}

.nav-header-link-text:hover::after {
    width: 100%;
}

.nav-header-link-text.active::after {
    position: absolute;
    left: 0;
    width: 100%;
    bottom: -9px;

    content: "";
    display: block;
    height: 2px;
    background-color: #ED1C24;;
}

.nav-header-link-text + .nav-header-link-text {
    margin-left: 42px;
}

.user-info {
    display: flex;
    align-items: center;
    margin-right: 30px;

    font-weight: 400;
    font-size: 12px;
    color: #A6AFB8;
}

</style>
