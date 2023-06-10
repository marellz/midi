<template>
  <layout-container class="px-5 py-20">
    <h1 class="text-4xl font-bold">Entities</h1>

    <template v-if="pending">
      <div>Loading</div>
    </template>
    <div class="mt-10">
      <custom-table :fields="fields" :items="entities">
        <template #id="{ id }">
          <p class="text-gray-500 font-bold">
            {{ id }}
          </p>
        </template>
        <template #name="{ name, sector }">
          <h1 class="font-medium">
            {{ name }}
          </h1>
          <p class="text-gray-500 text-sm mt-1">
            {{ sector.name }}
          </p>
        </template>
        <template #actions="{ id }">
          <div class="flex">
            <custom-cta @click="viewEntity(id)">View entity</custom-cta>
          </div>
        </template>
      </custom-table>
    </div>
  </layout-container>
</template>
<script setup lang-="ts">
definePageMeta({
  name: "DashEntities",
  layout: "dash",
});

const fields = ref([
  { label: "ID", key: "id" },
  { label: "Name", key: "name" },
  // { label: "Type", key: ["type"] },
  // { label: "Sector", key: "sector" },
  // { label: "Description", key: "description" },
  { label: "Created", key: "created" },
  { label: "Actions", key: "actions" },
]);

const { pending, data: entities } = await useCustomFetch(`/entities`, {});

const viewEntity = async (id) => navigateTo(`/dashboard/entities/${id}`);
</script>
