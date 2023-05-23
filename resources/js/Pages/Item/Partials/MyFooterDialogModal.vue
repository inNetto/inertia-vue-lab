<script setup>
import JetSecondaryButton from "@/Components/SecondaryButton.vue";

const emit = defineEmits(["closeModal"]);
</script>
<template>
    <jet-secondary-button @click="$emit('closeModal', false)">
        Exit
    </jet-secondary-button>
</template>
