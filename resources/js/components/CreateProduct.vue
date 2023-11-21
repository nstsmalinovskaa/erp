<template>
    <ModalWindow>
        <div>
            <h5>Добавление продукта</h5>
            <form>
                <label for="article">Артикул</label>
                <input type="text" id="article" name="article" required>

                <label for="name">Название</label>
                <input type="text" id="name" name="name" required>

                <label for="status">Статус</label>
                <select id="status" name="status">
                    <option class="option" value="active">Активно</option>
                    <option class="option" value="inactive">Неактивно</option>
                </select>
                <div class="attributes">
                    <h5>Атрибуты</h5>
                    <div class="attr-group" v-if="isAttribute">
                        <div class="name-atr">
                            <label for="name">Название</label>
                            <label for="name">Значение</label>
                        </div>
                        <div class="attribute-group">
                            <input type="text" name="attribute_name[]" required>
                            <input type="text" name="attribute_value[]" required>
                            <img class="delete-attribute" src="../../img/attribute.svg">
                        </div>
                    </div>
                    <a class="add-attr" >+ Добавить атрибут</a>
                </div>
                <button class="button-form" type="submit">Отправить</button>
            </form>
        </div>
    </ModalWindow>

</template>

<script>
import ModalWindow from "./ModalWindow.vue";

export default {
    name: "CreateProduct.vue",
    components: {ModalWindow},
    data: () => {
        return {
            isAttribute: false
        }
    }
}
</script>

<style scoped>

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
