<template>
  <div class="bg-blue-100">
    <layout-container class="py-20">
      <h1 class="text-4xl font-bold">{{ entity.name }}</h1>
      <div class="flex space-x-2 mt-2">
        <span class="text-gray-600">{{ entity.sector.name }}</span>
        <span class="text-blue-300">|</span>
        <span class="text-gray-600">{{ entity.type.name }}</span>
        <span class="text-blue-300">|</span>
        <span class="text-gray-600">Created {{ entity.created }}</span>
      </div>
      <div class="mt-10">
        <h6 class="text-primary text-lg font-medium mb-2">
          About
        </h6>
        <p>
          {{ entity.description }}
        </p>
      </div>
    </layout-container>
  </div>
  <div>
    <layout-container class="py-20"></layout-container>
  </div>
</template>

<script setup>
definePageMeta({
  name: "DashboardEntity",
  layout: "entity-dash",
});

const route = useRoute();
const id = route.params.id;

const {
  data: {
    value: { entity },
  },
} = await useCustomFetch(`/entities/${id}`);

// const entity = ref(data.value.entity);
</script>
