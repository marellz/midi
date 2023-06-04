<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold">Agent {{ id }}</h1>
  </layout-container>
</template>
<script setup>
definePageMeta({
  layout: "dash",
});

const route = useRoute()
const id = route.params.id

</script>
