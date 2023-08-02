<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton  from '@/Components/PrimaryButton.vue'
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useToast } from "vue-toastification";

const toast = useToast()

const { auth, equipment } = defineProps(['auth', 'equipment']);

const checked = ref(true)
checked.value = equipment.active == 1 ? true : false;

const form = useForm('getparams', { equipment });

const submitEquipment = async() => {
    await form.transform((data) => ({
        id: data.equipment.id ?? null,
        identification: data.equipment.identification,
        qrcode: data.equipment.qrcode,
        manufacturer: data.equipment.manufacturer,
        model: data.equipment.model,
        specification: data.equipment.specification,
        location: data.equipment.location,
        predictive: data.equipment.predictive,
        active: checked.value,
        created_by_company_id: auth.user.company_id
    })).post(route('create_equipment.store', form.equipment), {
        onSuccess: async (response) => {
            toast.success('Equipamento gravado com sucesso!')
        },
        onError: (errors) => {
            form.errors = errors;
            toast.error('Ocorreu um erro')
        }
    });
}
</script>

<template>
    <Head title="Equipamentos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Equipamento</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                {{ equipment.id > 0 ? 'Editar Equipamento' : 'Novo Equipamento' }} - {{ equipment.id }}
                            </h2>
                            <form @submit.prevent="submitEquipment">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="col-span-2 row-span-2">
                                        <label for="identification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Identificação</label>
                                        <input v-model="form.equipment.identification" type="text" name="identification" id="identification" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nome do equipamento" required="">
                                        <div v-if="form.errors.identification">{{ form.errors.identification }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="qrcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">QR Code</label>
                                        <input v-model="form.equipment.qrcode" type="text" name="qrcode" id="qrcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="código" >
                                        <div v-if="form.errors.qrcode">{{ form.errors.qrcode }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="manufacturer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fabricante</label>
                                        <input v-model="form.equipment.manufacturer" type="text" name="manufacturer" id="manufacturer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Fabricante" >
                                        <div v-if="form.errors.manufacturer">{{ form.errors.manufacturer }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
                                        <input v-model="form.equipment.model" type="text" name="model" id="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Modelo" >
                                        <div v-if="form.errors.model">{{ form.errors.model }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="specification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Especificação</label>
                                        <input v-model="form.equipment.specification" type="text" name="specification" id="specification" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Especificação" >
                                        <div v-if="form.errors.specification">{{ form.errors.specification }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Localização</label>
                                        <input v-model="form.equipment.location" type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Localização do equipamento" >
                                        <div v-if="form.errors.location">{{ form.errors.location }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="predictive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preditiva (Meses)</label>
                                        <input v-model="form.equipment.predictive" type="number" name="predictive" id="predictive" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempo da preditiva" required="">
                                        <div v-if="form.errors.predictive">{{ form.errors.predictive }}</div>
                                    </div>
                                    <div class="flex items-center mb-4">   
                                        <input name="active" type="checkbox" v-model="checked" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="active" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ativo</label>
                                        <div v-if="form.errors.active">{{ form.errors.active }}</div>
                                    </div> 
                                </div>
                                <div class="grid-cols-2" >
                                    <PrimaryButton method="post" type="submit" class="inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 hover:bg-green-800">
                                        Salvar
                                    </PrimaryButton>
                                    <a :href="route('equipment.index')">
                                        <button type="button" class="inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-800">
                                            Cancelar
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>