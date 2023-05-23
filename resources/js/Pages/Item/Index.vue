<script setup>
import { router, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import MyDialogModal from "../../Shared/MyDialogModal.vue";
import JetSecoundaryButton from "@/Components/SecondaryButton.vue";

import { computed, ref } from "vue";

const props = defineProps({
    items: { type: Array, required: true },
    sectors: { type: Array, default: undefined },
});

const openMyDialogModal = ref(false);

function openModalContracts() {
    router.visit(route("items"), {
        only: ["sectors"],
        preserveState: true,
        onSuccess: () => {
            openMyDialogModal.value = true;
        },
    });
}
</script>

<template>
    <AppLayout title="Team Settings">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Items Control
            </h2>
        </template>
        <div class="flex flex-col overflow-auto rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-indigo-400 border-b-2 border-gray-200">
                    <tr>
                        <th
                            scope="col"
                            class="pl-2 text-sm font-semibold tracking-wide text-white"
                        >
                            Actions
                        </th>
                        <th
                            scope="col"
                            class="text-sm font-semibold tracking-wide text-left text-white"
                        >
                            <span class="flex">Name </span>
                        </th>
                        <th
                            scope="col"
                            class="text-sm font-semibold tracking-wide text-left text-white"
                        >
                            Quantity required
                        </th>
                        <th
                            scope="col"
                            class="text-sm font-semibold tracking-wide text-left text-white"
                        >
                            Unitary Value
                        </th>
                        <th
                            scope="col"
                            class="px-2 text-xs font-semibold tracking-wider text-left text-white uppercase"
                        >
                            <span class="inline-flex w-full justify-between"
                                >Total Value</span
                            >
                        </th>
                        <th
                            scope="col"
                            class="px-2 text-xs font-semibold tracking-wider text-left text-white uppercase"
                        >
                            <span class="inline-flex w-full justify-between"
                                >Contracts</span
                            >
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(item, index) in props.items"
                        :key="item.id"
                        :class="{ 'bg-gray-50': index % 2 == 0 }"
                        class="bg-white border-b border-l border-r"
                    >
                        <td
                            class="p-3 text-sm text-gray-700 whitespace-nowrap text-center"
                        >
                            Edit
                        </td>
                        <td class="text-sm text-gray-700 whitespace-nowrap">
                            {{ item.nome }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            {{ item.quantidadeContratada }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            {{ item.valorUnitario }}
                        </td>
                        <td class="pl-8">
                            {{ item.valorTotal }}
                        </td>
                        <td class="pl-8">
                            <JetSecoundaryButton @click="openModalContracts"
                                >Open Contracts</JetSecoundaryButton
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <MyDialogModal
            :opened="openMyDialogModal"
            title="Here is my title"
            :content="sectors"
        />
    </AppLayout>
</template>
