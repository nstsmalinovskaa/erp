<template>
    <div class="modal-header">
        <img class="close-icon" src="../../../../../img/close.svg" alt="Enterprise Resource Planning logo">
    </div>
</template>

<script>
export default {
    name: "CloseButton.vue"
}
</script>

<style scoped>

.modal-header {
    margin-bottom: 30px;
}

.close-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

</style>
