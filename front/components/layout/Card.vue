<template>
  <div
    class="rounded border border-gray-100 p-3"
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
