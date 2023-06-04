<template>
  <div class="bg-blue-100">
    <layout-container class="py-20">
      <h1 class="text-4xl font-bold">{{ entity.name }}</h1>
      <div class="flex space-x-2 mt-2">
        <span>Sector {{ entity.sector_id }}</span>
        <span class="text-gray-300">|</span>
        <span>Entity-type {{ entity.entity_type_id }}</span>
        <span class="text-gray-300">|</span>
        <span>Created {{ entity.created_at }}</span>
      </div>
      <div class="mt-10">
        <h6 class="text-gray-500 text-lg font-medium mb-2">
          About this [entity-type-{{ entity.entity_type_id }}]
        </h6>
        <p>
          {{ entity.description }}
        </p>
      </div>
    </layout-container>
  </div>
  <div>
    <layout-container class=" py-20"></layout-container>
  </div>
</template>

<script setup lang="ts">
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
