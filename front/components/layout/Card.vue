<template>
  <div
    class="rounded-lg border border-gray-100 p-3 bg-white shadow"
    :class="[bgColor]"
  >
    <slot />
  </div>
</template>
<script setup>
defineProps({
  bgColor: "bg-white hover:bg-gray-100",
});
</script>
