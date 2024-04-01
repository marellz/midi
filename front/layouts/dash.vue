<template>
  <div class="app h-[100vh]">
    <div class="flex h-full">
      <dash-sidebar :links="links" />
      <div class="flex-auto overflow-auto pb-20">
        <slot />
      </div>
    </div>
  </div>
</template>
<script setup>
definePageMeta({
  name: "Dashboard",
});

const links = [
  { label: "Home", path: `/dashboard`, index: true },
  { label: "Entities", path: "/dashboard/entities" },
  { label: "Global products", path: "/dashboard/global-products" },
  { label: "Users", path: "/dashboard/users" },
];

</script>
