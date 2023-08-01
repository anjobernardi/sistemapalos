<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import vegaEmbed from 'vega-embed';
import { ref } from 'vue';

const { auth, total_maintenances, total_status, total_situation } = 
defineProps(['auth', 'total_maintenances', 'total_status', 'total_situation']);
  
const maintenances = ref([]); 
const services = ref([]); 
const situations = ref([]); 

maintenances.value = total_maintenances.map(item => {
    return { Manutenções: item.description, value: item.service_order_count };
  });

var yourVlSpec = {
  "$schema": "https://vega.github.io/schema/vega-lite/v5.json",
  "description": "Pie Chart with percentage_tooltip",
  "data": {
    "values": JSON.stringify(maintenances.value)
  },
  "mark": {"type": "arc", "tooltip": true},
  "encoding": {
    "theta": {"field": "value", "type": "quantitative", "stack": "normalize"},
    "color": {"field": "Manutenções", "type": "nominal"}
  }
};

services.value = total_status.map(item => {
    return { Status: item.description, value: item.service_order_count };
  });

  var yourVlSpec1 = {
  "$schema": "https://vega.github.io/schema/vega-lite/v5.json",
  "description": "Pie Chart with percentage_tooltip",
  "data": {
    "values": JSON.stringify(services.value)
  },
  "mark": {"type": "arc", "tooltip": true},
  "encoding": {
    "theta": {"field": "value", "type": "quantitative", "stack": "normalize"},
    "color": {"field": "Status", "type": "ordinal"}
  }
};

situations.value = total_situation.map(item => {
    return { Situação: item.description, value: item.service_order_count };
  });

  var yourVlSpec2 = {
  "$schema": "https://vega.github.io/schema/vega-lite/v5.json",
  "description": "Pie Chart with percentage_tooltip",
  "data": {
    "values": JSON.stringify(situations.value)
  },
  "mark": {"type": "arc", "tooltip": true},
  "encoding": {
    "theta": {"field": "value", "type": "quantitative", "stack": "normalize"},
    "color": {"field": "Situação", "type": "nominal"}
  }
};

vegaEmbed('#vis', yourVlSpec);
vegaEmbed('#vis1', yourVlSpec1);
vegaEmbed('#vis2', yourVlSpec2);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div id="vis"></div>
                    <div id="vis1"></div>
                    <div id="vis2"></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
