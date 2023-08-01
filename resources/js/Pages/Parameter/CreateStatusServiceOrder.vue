<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton  from '@/Components/PrimaryButton.vue'

const { auth, status_service_order } = defineProps(['auth', 'status_service_order']);

const form = useForm('getparams', { status_service_order });

const submitStatusServiceOrder = async() =>{
    await form.transform((data) => ({
        id: status_service_order.id ?? null,
        description: data.status_service_order.description,
        created_by_company_id: auth.user.company_id,
    })).post(route('create_status_service_order.store'), form.status_service_order)
}   
</script>

<template>
    <Head title="Status OS" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Status OS</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                {{ status_service_order.id > 0 ? "Editar Status OS" : "Novo Status OS" }} - {{ status_service_order.id }}      
                            </h2>
                            <form @submit.prevent="submitStatusServiceOrder">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="w-full">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                                        <input v-model="form.status_service_order.description" type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Status da OS" required="" >
                                        <div v-if="form.errors.description">{{ form.errors.description }}</div>                                   
                                    </div>
                                </div>
                                <div class="grid-cols-2" >
                                    <PrimaryButton method="post" type="submit" class="inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 hover:bg-green-800">
                                        Salvar
                                    </PrimaryButton>
                                    <a :href="route('status_service_order.index')">
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