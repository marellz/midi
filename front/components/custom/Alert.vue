<template>
  <div class="rounded p-3" :class="alertTypes[type] ?? alertTypes['info']">
    <div class="font-medium">
      <slot />
    </div>
  </div>
</template>
<script setup>
defineProps({
  type: {
    type: String,
    default: "error",
  },
});

const alertTypes = {
  error: "bg-red-50 border border-red-500 text-red-500",
  info: "bg-cyan-50 border border-cyan-500 text-cyan-500",
  success: "bg-green-50 border border-green-500 text-green-500",
};
</script>
