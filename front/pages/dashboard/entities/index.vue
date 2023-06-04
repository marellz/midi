<template>
  <layout-container class="px-5 py-20">
    <h1 class="text-4xl font-bold">Entities</h1>

    <template v-if="pending">
      <div>Loading</div>
    </template>
    <div class="mt-10">
      <custom-table
        :fields="fields"
        :items="entities"
        @row-click="(id) => viewEntity(id)"
      >
        <template #actions=""> Actions </template>
      </custom-table>
    </div>

    {{ entites }}
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
  { label: "Type", key: "entity_type_id" },
  { label: "Sector", key: "sector_id" },
  { label: "Description", key: "description" },
  { label: "Created", key: "created_at" },
  { label: "Actions", key: "actions" },
]);


const { pending, data: entities } = await useCustomFetch(`/entities`, {});

const viewEntity = async (id) => navigateTo(`/dashboard/entities/${id}`);


</script>
