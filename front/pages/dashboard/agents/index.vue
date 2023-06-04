<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold">Agents</h1>
  </layout-container>
  <div>
    <layout-container>
      {{ agents }}
    </layout-container>
  </div>
</template>
<script setup>
definePageMeta({
  layout: "dash",
});

const {
  data: {
    value: { agents },
  },
} = useCustomFetch(`/agents`);
</script>
