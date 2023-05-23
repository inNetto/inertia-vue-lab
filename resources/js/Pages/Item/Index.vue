<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    items: { type: Array, required: true },
    sectors: { type: Array, default: undefined },
});
</script>

<template>
    <div><h4>List of Items</h4></div>
    {{ props.items }}
    <Link
        href="items"
        :only="['sectors']"
        method="get"
        as="button"
        type="button"
        >Sectors</Link
    >
    <div>
        <h4>List of Sectors</h4>
        {{ props.sectors }}
    </div>
</template>
