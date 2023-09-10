<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";
import { ref } from 'vue';

const toast = useToast()

const { auth, equipment, parts } = defineProps(['auth', 'equipment', 'parts']);
const maintenancePlanModal = ref({});
const showModal = ref(false);   

const form = useForm('getparams', { 
    equipment_id: null,
    period: null,
    description: null,
    created_by_company_id: auth.user.company_id,
 })

const formComponent = useForm('getparams', { 
    equipment_id: null,
    part_id: null,
    activity: null,
    created_by_company_id: auth.user.company_id,
 })

const submitPart = async (id) => {
    await form.transform((data) => ({
        ...data,
        equipment_id: id,
        created_by_company_id: auth.user.company_id,
    })).post(route('part.store'), {
        onSuccess: (response) => {
            toast.success('Componente gravado com sucesso!');
            form.reset();
        },
    })
}

const submitMaintenancePlan = async (equipment_id, part_id) => {
    await formComponent.transform((data) => ({
        ...data,
        equipment_id: equipment_id,
        part_id: part_id,
        activity: form.activity,
        active: true,
        created_by_company_id: auth.user.company_id,
    })).post(route('plan.store'), {
        onSuccess: (response) => {
            toast.success('Atividade gravada com sucesso!');
            formComponent.reset();
        },
    })
}

const addMaintenancePlan = (part) => {
    showModal.value = true;
    maintenancePlanModal.value.parts = part
}

const closePlanModal = () => {
    showModal.value = false;
    maintenancePlanModal.value = {};

    formComponent.reset();
}

</script>

<template>
    <Head title="Componentes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Componentes</h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Adicionar componente ao equipamento</h2>
                        <form @submit.prevent="submitPart(equipment.id)">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="equipment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipamento ID</label>
                                    <input :value="equipment.id" type="text" name="equipment_id" id="equipment_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Id do equipamento" required="" readonly>
                                    <div v-if="form.errors.equipment_id">{{ form.errors.equipment_id }}</div>
                                </div>
                                <div class="w-full">
                                    <label for="period" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Período</label>
                                    <input v-model="form.period" type="number" name="period" id="period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="em meses" required="">
                                    <div v-if="form.errors.period">{{ form.errors.period }}</div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                                    <input v-model="form.description" type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Descrição do ítem" required="">
                                    <div v-if="form.errors.description">{{ form.errors.description }}</div>
                                </div>
                            </div>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Inserir
                            </button>
                        </form>
                    </div>
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg"> 
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Equipamento
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <div class="flex items-center">
                                                Descrição
                                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Frequência
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ação
                                        </th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="part in parts" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{part.equipment_id}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{part.description}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{part.period}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" @click="addMaintenancePlan(part)" class="font-medium text-orange-500 dark:text-orange-blue-500 hover:underline">Atividade</a>
                                        </td>
                                    </tr>
                                </tbody>    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal :show="showModal" @close="closePlanModal">
            <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Adicionar atividade ao componente {{ maintenancePlanModal.parts.id }} </h2>
                <form @submit.prevent="submitMaintenancePlan(maintenancePlanModal.parts.equipment_id, maintenancePlanModal.parts.id)">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="equipment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipamento ID</label>
                            <input :value="maintenancePlanModal.parts.equipment_id" type="text" name="equipment_id" id="equipment_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                            <div v-if="form.errors.equipment_id">{{ form.errors.equipment_id }}</div>
                        </div>
                        <div class="w-full">
                            <label for="part_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Componente ID</label>
                            <input v-model="maintenancePlanModal.parts.id" type="text" name="part_id" id="part_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                            <div v-if="form.errors.part_id">{{ form.errors.part_id }}</div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="activity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Atividade</label>
                            <input v-model="form.activity" type="text" name="activity" id="activity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Descrição da atividade" required="">
                            <div v-if="form.errors.activity">{{ form.errors.activity }}</div>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Inserir
                    </button>
                </form>
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg"> 
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Equipamento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Componente
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Atividade
                                </th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr v-for="plan in maintenancePlanModal.parts.plans" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{plan.equipment_id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{plan.part_id}}
                                </td>
                                <td class="px-6 py-4">
                                    {{plan.activity}}
                                </td>
                            </tr>
                        </tbody>    
                    </table>
                </div>
            </div>
        </modal> 
    </AuthenticatedLayout>
</template>