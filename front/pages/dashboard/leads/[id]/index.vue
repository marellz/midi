<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold"> Lead {{id}}</h1>
  </layout-container>
</template>
<script setup>
definePageMeta({
  layout: "dash",
});

const id = route.params.id

</script>
