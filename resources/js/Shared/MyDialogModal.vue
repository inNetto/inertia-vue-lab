<script setup>
import JetDialogModal from "@/Components/DialogModal.vue";
import MyFooterDialogModal from "../Pages/Item/Partials/MyFooterDialogModal.vue";

const props = defineProps({
    opened: { type: Boolean, default: false },
    title: { type: String, default: "Title here" },
    content: { type: Array, default: undefined },
});
</script>
<template>
    <JetDialogModal :show="opened" @close="opened = false">
        <template #title> {{ props.title }} </template>

        <template #content>
            {{ props.content }}
        </template>

        <template #footer>
            <MyFooterDialogModal @closeModal="(value) => (opened = value)" />
        </template>
    </JetDialogModal>
</template>
