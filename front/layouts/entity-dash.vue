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

const route = useRoute();
const id = route.params.id || 1
const entityUrl = `/dashboard/entities`

const links = [
  { label: "Dashboard", path: `${entityUrl}/${id}` },
  { label: "Members", path: `${entityUrl}/${id}/members` },
  { label: "Contributions", path: `${entityUrl}/${id}/contributions` },
  { label: "Products", path: `${entityUrl}/${id}/products` },
  { label: "Loans", path: `${entityUrl}/${id}/loans` },
];

</script>
