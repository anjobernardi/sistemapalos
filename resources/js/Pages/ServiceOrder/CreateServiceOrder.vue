<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import PrimaryButton  from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';

const { auth, service_order, maintenances, status_service_orders, equipment_situations, equipments } = 
defineProps(['auth', 'service_order', 'maintenances', 'status_service_orders', 'equipment_situations', 'equipments']);

const checked_mechanical = ref(true)
checked_mechanical.value = service_order.mechanical_team == 1 ? true : false;
const checked_electrical = ref(true)
checked_electrical.value = service_order.electrical_team == 1 ? true : false;
const addingEquipment = ref(false);
const confirmingSOClosure = ref(false);
const partSelected = ref([]);

let parts = [];

if(service_order.equipment?.parts.length >= 1) {
    parts = service_order.equipment.parts;
}
else{
    parts = [{
            'id': service_order.equipment?.parts.id ?? null,
            'description': service_order.equipment?.parts.description ?? null,
            'period': service_order.equipment?.parts.period ?? null,
            'active': service_order.equipment?.parts.active ?? null,
        }]
}

if(service_order.id >= 1){
    partSelected.value = service_order.parts.map( part => part.id )
}

const form = useForm('getparams', { service_order: {
    'id': service_order.id ?? null,
    'maintenance_id': service_order.maintenance_id ?? null,
    'status_service_order_id': service_order.status_service_order_id ?? null,
    'equipment_situation_id': service_order.equipment_situation_id ?? null,
    'equipment_id': service_order.equipment_id ?? null,
    'opening_user': service_order.open_user?.name ?? null,
    'closing_user': service_order.close_user?.name ?? null,
    'value_labor': service_order.value_labor ?? null,
    'value_parts': service_order.value_parts ?? null,
    'third_part_service': service_order.third_part_service ?? null,
    'observation': service_order.observation ?? null,
    'description': service_order.description ?? null,
    'electrical_team': service_order.electrical_team ?? null,
    'mechanical_team': service_order.mechanical_team ?? null,
    'closed': service_order.closed ?? false,
    'created_by_company_id': service_order.created_by_company_id ?? null,
    'equipment': {
        'identification': service_order.equipment?.identification ?? null,
        'qrcode': service_order.equipment?.qrcode ?? null,
        'description': service_order.equipment?.description ?? null,
        'location': service_order.equipment?.location ?? null,
        'predictive': service_order.equipment?.predictive ?? null,
        'active': service_order.equipment?.active ?? null,
        'created_by_company_id': service_order.equipment?.created_by_company_id ?? null,
        'parts': parts
    }}})

const submitServiceOrder = async() => {
    await form.transform((data) => ({
        id: data.service_order.id ?? null,
        maintenance_id: data.service_order.maintenance_id,
        status_service_order_id: data.service_order.status_service_order_id,
        equipment_situation_id: data.service_order.equipment_situation_id,
        equipment_id: data.service_order.equipment_id,
        opening_user: data.service_order.opening_user ? service_order.open_user.id : auth.user.id,
        closing_user: auth.user.id,
        value_labor: data.service_order.value_labor,
        value_parts: data.service_order.value_parts,
        third_part_service: data.service_order.third_part_service,
        observation: data.service_order.observation,
        description: data.service_order.description,
        electrical_team: checked_mechanical.value,
        mechanical_team: checked_electrical.value,
        closed: false,
        created_by_company_id: auth.user.company_id,
        selected: partSelected.value
    })).post(route('create_service_order.store'), form.service_order)
}

const closeServiceOrder = () => {
    confirmingSOClosure.value = true;
}

const submitSelectEquipment = async (equip) => {
    form.service_order.equipment_id = equip.id;
    form.service_order.equipment =  equip

    addingEquipment.value = false;
};

const addEquipment = () => {
    addingEquipment.value = true;
};

const closeModal = () => {
    addingEquipment.value = false;
    confirmingSOClosure.value = false;

    form.reset();
};

const closeSOConfirmation = async (id) => {
    await form.patch(route('create_service_order.close', id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Ordem de Serviço" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Ordem de Serviço</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                {{ service_order.id > 0 ? 'Editar Ordem de Serviço' : 'Nova Ordem de serviço' }} - {{ service_order.id }}
                            </h2>
                            <form @submit.prevent="submitServiceOrder">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div>
                                        <label for="maintenance_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Manutenção</label>
                                        <select v-model="form.service_order.maintenance_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option v-for="maintenance in maintenances" :value="maintenance.id">{{ maintenance.description }}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="status_service_order_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status OS</label>
                                        <select v-model="form.service_order.status_service_order_id" id="status_service_order_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option v-for="status_service_order in status_service_orders" :value="status_service_order.id">{{ status_service_order.description }}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="equipment_situation_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Situação do Equipamento</label>
                                        <select v-model="form.service_order.equipment_situation_id" id="equipment_situation_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option v-for="equipment_situation in equipment_situations" :value="equipment_situation.id">{{ equipment_situation.description }}</option>
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <a href="#" @click.prevent="addEquipment()" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Equipamento</a>
                                        <input v-model="form.service_order.equipment.identification" type="text" name="equipment_id" id="equipment_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Equipamento" required="">
                                        <div v-if="form.errors.equipment_id">{{ form.errors.equipment_id }}</div>
                                    </div>
                                    <div class="col-span-2 row-span-2">
                                        <table class="w-full text-sm text-left text-gray-500 border border-separate rounded-lg border-spacing-2 border-slate-300 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="p-4">
                                                        <div class="flex items-center">
                                                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        ID
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Descrição
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Periodo
                                                    </th>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="part in form.service_order.equipment?.parts" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <td class="w-4 p-4">
                                                        <div class="flex items-center">
                                                            <input v-model="partSelected" :value="part.id" id="checkbox-table-search-1" type="checkbox" multiple class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        </div>
                                                    </td>
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ part.id }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ part.description }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ part.period }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-span-2 row-span-2">
                                        <label for="opening_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuário abertura</label>
                                        <input v-if="service_order.open_user?.id" :value="form.service_order.opening_user" type="text" name="opening_user" id="opening_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Usuário" readonly> 
                                        <input v-else v-model="auth.user.name" type="text" name="opening_user" id="opening_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Usuário" required="" readonly> 
                                        <div v-if="form.errors.opening_user">{{ form.errors.opening_user }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="value_labor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora trabalhada</label>
                                        <input v-model="form.service_order.value_labor" type="text" name="value_labor" id="value_labor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Valor hora">
                                        <div v-if="form.errors.value_labor">{{ form.errors.value_labor }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="value_parts" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor peças</label>
                                        <input v-model="form.service_order.value_parts" type="text" name="value_parts" id="value_parts" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Valor peças">
                                        <div v-if="form.errors.value_parts">{{ form.errors.value_parts }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="third_part_service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor terceiros</label>
                                        <input v-model="form.service_order.third_part_service" type="text" name="third_part_service" id="third_part_service" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Valor terceiros">
                                        <div v-if="form.errors.third_part_service">{{ form.errors.third_part_service }}</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="observation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observação</label>
                                        <input v-model="form.service_order.observation" type="text" name="observation" id="observation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Observação">
                                        <div v-if="form.errors.observation">{{ form.errors.observation }}</div>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                                        <textarea v-model="form.service_order.description" id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Descrição da ordem de serviço"></textarea>
                                        <div v-if="form.errors.description">{{ form.errors.description }}</div>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <input v-model="checked_mechanical" id="mechanical_team" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="mechanical_team" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time mecânico</label>
                                        <div v-if="form.errors.mechanical_team">{{ form.errors.mechanical_team }}</div>
                                    </div> 
                                    <div class="flex items-center mb-4">
                                        <input v-model="checked_electrical" id="electrical_team" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="electrical_team" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Time elétrico</label>
                                        <div v-if="form.errors.electrical_team">{{ form.errors.electrical_team }}</div>
                                    </div> 
                                </div>
                                <div class="flow-root">
                                    <div class="float-left" >
                                        <PrimaryButton method="post" type="submit" class="inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 hover:bg-green-800">
                                            Salvar
                                        </PrimaryButton>
                                        <a :href="route('service_order.index')">
                                            <button type="button" class="inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-800">
                                                Cancelar
                                            </button>
                                        </a>
                                    </div>
                                    <div class="float-right">
                                        <a :href="route('service_order.index')">
                                            <button type="button" @click.prevent="closeServiceOrder()" class="inline-flex justify-items-end mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-yellow-500">
                                                Fechar OS
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <section class="bg-white dark:bg-gray-900">
            <Modal :show="addingEquipment" @close="closeModal">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Equipamento Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Identificação
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descrição
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ativo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ação
                                    </th>
                                 </tr>
                            </thead>
                            <tbody>
                                <tr v-for="equipment in equipments" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{equipment.id}}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{equipment.identification}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{equipment.description}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{equipment.active}}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" @click.prevent="submitSelectEquipment(equipment)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Selecionar</a>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </Modal>
            <Modal :show="confirmingSOClosure" @close="closeModal">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        Tem certeza que deseja encerrar a Ordem de Serviço?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Após o encerramento não será mais possivel alterá-la.
                    </p>

                    <div class="flex justify-end mt-6">
                        <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                        <DangerButton
                            class="ml-3"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click.prevent="closeSOConfirmation(form.service_order.id)"
                        >
                            Fechar OS
                        </DangerButton>
                    </div>
                </div>
            </Modal>
        </section>  
    </AuthenticatedLayout>
</template>