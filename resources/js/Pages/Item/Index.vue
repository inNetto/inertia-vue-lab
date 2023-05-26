<script setup>
import { router, usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import MyDialogModal from "../../Shared/MyDialogModal.vue";
import JetPrimaryButton from "@/Components/PrimaryButton.vue";
import SectionTitle from "@/Components/SectionTitle.vue";
import Table from "@/Components/DataTable.vue";
import { computed, ref } from "vue";

const props = defineProps({
    items: { type: Array, required: true },
    sectors: { type: Array, default: undefined },
});

const openMyDialogModal = ref(false);

const tableColumns = [
    { label: "Nome", field: "name" },
    { label: "Quantidade requerida", field: "quantity_required" },
    { label: "Valor unitário", field: "unitary_value" },
    { label: "Valor total", field: "total_value" },
];

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
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <SectionTitle>
                    <template #title> Items Settings </template>
                    <template #description>
                        Here you can manage items. Still building ...
                    </template>
                </SectionTitle>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div
                        class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow"
                    >
                        <JetPrimaryButton class="mb-2"
                            >+ Create Item</JetPrimaryButton
                        >
                        <Table
                            :columns="tableColumns"
                            :data="props.items"
                        ></Table>
                    </div>
                </div>
            </div>
        </div>
        <MyDialogModal
            :opened="openMyDialogModal"
            title="Here is my title"
            :content="sectors"
        />
    </AppLayout>
</template>
