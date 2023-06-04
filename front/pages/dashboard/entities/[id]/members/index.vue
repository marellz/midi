<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold">Members</h1>
  </layout-container>
  <div>
    <layout-container class="">
      <custom-table :fields="fields" :items="members"></custom-table>
    </layout-container>
  </div>
</template>
<script setup>
definePageMeta({
  layout: "entity-dash",
});

// const members = ref([]);con
const route = useRoute();
const id = route.params.id;
const fields = ref([
  {
    label: "Name",
    key: "name",
  },
  {
    label: "Email",
    key: "email",
  },
  {
    label: "Phone",
    key: "phone",
  },
  {
    label: "Actions",
    key: "actions",
  },
]);

const { data: members } =  await useCustomFetch(`/entities/${id}/members`)

</script>
