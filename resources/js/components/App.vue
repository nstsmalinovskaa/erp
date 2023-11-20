<template>

        <div class="sidebar">
            <div class="sidebar-logo">
                <div class="logo">
                    <img src="../../img/logo.svg">
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
                            <!-- <li class="nav-header-link-text"><a href="#">story</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="user-info">
                    <a href="#">Имя Пользователя</a>
                </div>
            </header>

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
                        <tr>
                            <td><a href="">mtokb2</a></td>
                            <td><a href="">MTOK-B2/216-1KT3645-K</a></td>
                            <td><a href="">Доступен</a></td>
                            <td><a href="">Цвет: черный <br> Размер: L</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="button-add" type="submit">Добавить</button>
            </div>
        </main>
</template>

<script>
export default {
    name: "App.vue"
}
</script>

<style scoped>

</style>
