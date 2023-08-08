<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';

const toast = useToast()

const printReport = ref(false);

const { maintenances, filenames} = defineProps(['maintenances', 'filenames']);

const form = useForm('getparams', { });

const generate = async () => {
    await form.get(route('maintenance_report.generate'), {
        onSuccess: async (response) => {
            toast.success('Relatório gerado com sucesso!')
        },
        onError: (errors) => {
            toast.error('Ocorreu um erro, verifique os dados e tente novamente.')
        }
    });
};

const openModal = () => {
    printReport.value = true;
};

const closeModal = () => {
    printReport.value = false;

    form.reset();
};
</script>

<template>
    <Head title="Relatório" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Relatório</h2>
            <!--<iframe :src="route('maintenance_report.report')" />-->
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <a :href="route('maintenance_report.index')">
                    <button type="button" @click.prevent="generate()" class="inline-flex justify-items-start mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-yellow-500">
                        Gerar relatório
                    </button>
                </a>
                <button type="button" @click.prevent="openModal()" class="inline-flex justify-items-start mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-600">
                    Imprimir
                </button>
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="col-span-2 row-span-2">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Ordem de Serviço
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Equipamento
                                        </th>
                                            <th scope="col" class="px-6 py-3">
                                            Identificação
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ítem
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Data
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="maintenance in maintenances" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ maintenance.service_order_id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ maintenance.equipment_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ maintenance.identification }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ maintenance.part_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ maintenance.next_maintenance }}
                                        </td>
                                    </tr>
                                </tbody>    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <Modal :show="printReport" @close="closeModal">
                <div class="p-6">
                    <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Arquivo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Download
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="filename in filenames" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ filename }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <td class="px-6 py-4 text-right">
                                        <a :href="route('maintenance_report.download', filename)" @close="closeModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">Baixar</a>
                                    </td>
                                </th>
                            </tr>
                        </tbody>    
                    </table>
                </div>
            </Modal>
        </section>
    </AuthenticatedLayout>
</template>