<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold">Styleguide</h1>
  </layout-container>
  <div class="mt-10">
    <layout-container class="py-20">
      <h1 class="text-xl font-bold text-gray-700">Tabs</h1>
      <div class="mt-10">
        <custom-tabs :tabs="tabs">
          <template #tab-1> Content tab 1 </template>
          <template #tab-2> Content tab 2 </template>
          <template #tab-3> Content tab 3 </template>
        </custom-tabs>
      </div>
    </layout-container>
  </div>
</template>
<script setup>
const tabs = ref([
  {
    label: "Tab 1",
    key: "tab-1",
  },
  {
    label: "Tab 2",
    key: "tab-2",
  },
  {
    label: "Tab 3",
    key: "tab-3",
  },
]);
</script>
