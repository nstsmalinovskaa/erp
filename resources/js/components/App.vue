<template>

    <body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <div class="logo">
                <img src="../../../public/img/logo.svg" alt="hui">
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
            <!-- header-links -->
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
            <!-- // header-links -->
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

        <div class="form-container">
            <div class="form-header">
                <h5>Добавление продукта</h5>
                <img class="close-icon" src="../../../public/img/close.svg" alt="Enterprise Resource Planning logo">
            </div>
            <form>

                <label for="article">Артикул</label>
                <input type="text" id="article" name="article" required>

                <label for="name">Название</label>
                <input type="text" id="name" name="name" required>

                <label for="status">Состояние:</label>
                <select id="status" name="status">
                    <option class="option" value="active">Активно</option>
                    <option class="option" value="inactive">Неактивно</option>
                </select>



                <div class="attributes">
                    <h5>Атрибуты</h5>
                    <!-- <div class="name-atr">
                        <label for="name">Название</label>
                        <label for="name">Значение</label>
                    </div>
                    <div class="attribute-group">
                        <input type="text" name="attribute_name[]"  required>
                        <input type="text" name="attribute_value[]"  required>
                        <img class="delete-attribute" src="/img/attribute.svg">
                    </div> -->

                    <a class="add-attr">+ Добавить атрибут</a>
                </div>

                <button  class="button-form" type="submit">Отправить</button>
            </form>
        </div>
        <div class="hui" >

        </div>
        <div class="form-container">
            <div class="form-header">
                <h5>Редактирование продукта</h5>
                <img class="close-icon" src="/img/сlose.svg" alt="Enterprise Resource Planning logo">
            </div>
            <form>

                <label for="article">Артикул</label>
                <input type="text" id="article" name="article" required>

                <label for="name">Название</label>
                <input type="text" id="name" name="name" required>

                <label for="status">Состояние:</label>
                <select id="status" name="status">
                    <option class="option" value="active">Активно</option>
                    <option class="option" value="inactive">Неактивно</option>
                </select>



                <div class="attributes">
                    <h5>Атрибуты</h5>
                    <!-- <div class="name-atr">
                        <label for="name">Название</label>
                        <label for="name">Значение</label>
                    </div>
                    <div class="attribute-group">
                        <input type="text" name="attribute_name[]"  required>
                        <input type="text" name="attribute_value[]"  required>
                        <img class="delete-attribute" src="./img/attribute.svg">
                    </div> -->

                    <a class="add-attr">+ Добавить атрибут</a>
                </div>

                <button  class="button-form" type="submit">Отправить</button>
            </form>
        </div>
        <div class="hui" >

        </div>


        <div class="product-card">

            <div class="form-header">
                <h5>Редактирование продукта</h5>
                <span class="edit-icon">✏️</span>
                <img class="close-icon" src="/img/сlose.svg" alt="Enterprise Resource Planning logo">
            </div>
            <div class="info">
                <div class="attribute">Артикул:</div>
                <div class="value">Значение артикула</div>
            </div>

            <!-- Иконки удаления и редактирования в правом верхнем углу -->

        </div>
    </main>
    </body>
</template>

<script>
export default {
    name: "App.vue"
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');


body {
    font-family: 'Roboto', sans-serif;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: 400;
    line-height: 1;
    background-color: #F2F6FA;

    display: flex;
}

.none {
    display: none !important;
}

.visually-hidden {
    opacity: 0;
    visibility: hidden;
    width: 0px;
    height: 0px;
    display: block;
    margin-left: -10000px;
    background: transparent;
    font-size: 0;
}


/* Sidebar */
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
    align-items: center;
}

.sidebar-logo span {
    font-weight: 400;
    font-size: 12px;
    color: #FFFFFF;

    margin-left: 12px;
}

/* Nav */
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

/* Main */

.main {
    width: 100%;
}

/* Header */

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    column-gap: 30px;
    height: 60px;
    background-color: #FFFFFF;
}

/* Nav header */

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

/* Table */
.content {
    width: auto;
    display: flex;
    justify-content: space-between;
}

.table-container {
    width: 800px;
}

.table {
    width: 100%;
    border: none;
    margin-bottom: 20px;
    border-collapse: collapse;

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
}

.table tbody td  a:hover{
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

.form-container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background-color: #374050;
    border-radius: 8px;
    position: relative;


}

.form-header {
    margin-bottom: 30px;
}

h5 {
    font-size: 20px;
    font-weight: 700;
}

.close-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

.edit-icon {
    position: absolute;
    top: 10px;
    right: 40px;
    font-size: 20px;
    cursor: pointer;
}

label {
    display: block;
    margin-bottom: 8px;

    font-size: 10px;
    font-weight: 400;

}

input{
    width: 450px;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

select {
    width: 450px;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;

    font-size: 10px;
    color: #000;
    font-weight: 400;
}

.attributes h5{
    font-size: 14px;
    margin-bottom: 20px;
}

.attribute-group {
    width: 450px;
    display: flex;
    align-items: center;
}

.name-atr{
    width: 450px;
    display: flex;
    justify-content: space-between; /* Выравнивание элементов по краям */
    align-items: center;
}

.name-atr label:last-child{
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

.add-attr{
    color: #0FC5FF;
    text-decoration: none;
    border-bottom: 1px dashed #0FC5FF;
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

.hui {
    margin-top: 10px;
}

.product-card {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background-color: #374050;
    border-radius: 8px;
    position: relative;

}

.title {
    font-weight: bold;
}

.info {
    width: 450px;
    display: flex;
    flex-direction: row;

}

.attribute {

    padding-right: 20px;
}




.icons {
    position: absolute;
    top: 0;
    right: 0;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.delete-icon,
.edit-icon,
.close-button {
    cursor: pointer;
    margin: 5px;
}

/* Дополнительные стили по необходимости */

</style>

