<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton  from '@/Components/PrimaryButton.vue'
import { Head, useForm } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";

const toast = useToast()

const { auth, maintenance } = defineProps(["auth", "maintenance"]);

const form = useForm("getparams", { maintenance });

const submitMaintenance = async() =>{
    await form.transform((data) => ({
        id: maintenance.id ?? null,
        description: data.maintenance.description,
        created_by_company_id: auth.user.company_id,
    })).post(route('create_maintenance.store', form.maintenance), {
        onSuccess: async (response) => {
            toast.success('Tipo de manutenção gravada com sucesso!')
        },
        onError: (errors) => {
            form.errors = errors;
            toast.error('Ocorreu um erro')
        }
    });
}

</script>

<template>
    <Head title="Manutenção" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Manutenção</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                {{ maintenance.id > 0 ? "Editar Manutenção" : "Nova Manutenção" }} - {{ maintenance.id }}
                            </h2>
                            <form @submit.prevent="submitMaintenance">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="w-full">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                                        <input v-model="form.maintenance.description" type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Manutenção" required="" >
                                        <div v-if="form.errors.description">{{ form.errors.description }}</div>
                                    </div>
                                </div>
                                <div class="grid-cols-2" >
                                    <PrimaryButton method="post" type="submit" class="inline-flex items-center mr-2 mb-2 px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800 hover:bg-green-800">
                                        Salvar
                                    </PrimaryButton>
                                    <a :href="route('maintenance.index')">
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