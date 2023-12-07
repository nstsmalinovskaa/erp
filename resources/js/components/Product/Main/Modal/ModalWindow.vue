<template>

    <div class="modal" @click.self="close">
        <div class="modal-content">
            <Close-button @click="close"/>
            <div>
               <slot/>
            </div>
        </div>
    </div>

</template>

<script>
import CloseButton from './CloseButton.vue'

export default {
    name: "ModalWindow.vue",
    components: {CloseButton},

    methods: {
        close() {
            this.$emit('close')
        }
    },

    emits: ['close']
}
</script>

<style scoped>

.modal {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;

    background-color: rgba(0, 0, 0, 0.6);
}

.modal-content {
    width: auto;
    margin: auto;
    padding: 16px;
    background-color: #374050;
    border-radius: 8px;
    position: relative;
    display: flex;
    justify-content: flex-start;
}

</style>
