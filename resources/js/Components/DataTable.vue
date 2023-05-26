<template>
    <table class="table">
        <thead>
            <tr>
                <th
                    v-for="column in columns"
                    :key="column.field"
                    class="px-4 py-2"
                >
                    {{ column.label }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in data" :key="item.id">
                <td
                    v-for="column in columns"
                    :key="column.field"
                    class="px-4 py-2"
                >
                    {{ item[column.field] }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
import { defineProps } from "vue";

const props = defineProps({
    columns: {
        type: Array,
        required: true,
    },
    data: {
        type: Array,
        required: true,
    },
});
</script>

<style scoped>
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    border: 1px solid #e2e8f0;
}

.table th {
    background-color: #edf2f7;
}

.table th,
.table td {
    padding: 0.75rem;
    text-align: left;
}
</style>
