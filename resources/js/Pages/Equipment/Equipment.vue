<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Modal from '@/Components/Modal.vue';

const { auth, equipments } = defineProps(['auth', 'equipments']);
const equipmentsModal = ref({});
const addingEquipmentPart = ref(false);

const form = useForm('getparams', { 
    equipment_id: null,
    period: null,
    description: null,
    created_by_company_id: auth.user.company_id,
 })

const submitEquipmentDestroy = async (id) => {
    await form.delete(route('create_equipment.destroy', id))
}

const submitPartDestroy = async (id, index) => {
    await form.delete(route('part.destroy', id), {
        onSuccess: () => {
            equipmentsModal.value.parts.splice(index, 1)
        }
    })
}

const submitPart = async (id) => {
    await form.transform((data) => ({
        ...data,
        equipment_id: id,
        created_by_company_id: auth.user.company_id,
    })).post(route('part.store'), {
        onSuccess: (response) => {
            equipmentsModal.value.parts.push({ 
            equipment_id: id,
            period: form.period,
            description: form.description,
            created_by_company_id: auth.user.company_id,
        })
        form.reset()
        },
    })
}

const addEquipmentPart = (equipment) => {
    addingEquipmentPart.value = true;
    equipmentsModal.value = equipment;
};

const closeModal = () => {
    addingEquipmentPart.value = false;
    equipmentsModal.value = {};

    form.reset();
};
</script>

<template>
    <Head title="Equipamentos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Equipamentos</h2>
        </template>

        {{ auth.user.company_id }}
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                
                <a :href="route('create_equipment.create')">
                    <PrimaryButton type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Adicionar</PrimaryButton>
                </a>

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Identificação
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Código
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Fabricante
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Modelo
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Localização
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Ativo
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Destroy</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Add</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="equipment in equipments" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ equipment.id }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ equipment.identification }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ equipment.qrcode }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ equipment.manufacturer }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ equipment.model }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ equipment.location  }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ equipment.active ? 'Sim' : 'Não'  }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a :href="route('create_equipment.edit', equipment.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" @click="addEquipmentPart(equipment)" class="font-medium text-green-600 dark:text-green-blue-500 hover:underline">Add peça</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="bg-white dark:bg-gray-900">
            <Modal :show="addingEquipmentPart" @close="closeModal">
                <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Adicionar ítem ao equipamento {{ equipmentsModal.id }} </h2>
                    <form @submit.prevent="submitPart(equipmentsModal.id)">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="equipment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipamento ID</label>
                                <input :value="equipmentsModal.id" type="text" name="equipment_id" id="equipment_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Id do equipamento" required="" readonly>
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
                <div v-if="equipmentsModal.parts.length > 0" class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Equipamento Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Descrição
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Período
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ação
                                    </th>
                                 </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(part, index) in equipmentsModal.parts" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                                        <a href="#" @click.prevent="submitPartDestroy(part.id, index)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Apagar</a>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </Modal>
        </section>  
    </AuthenticatedLayout>
</template>