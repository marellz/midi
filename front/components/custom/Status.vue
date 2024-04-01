<template>
  <span
    class="inline-flex items-center py-1 px-2 rounded-lg cursor-default"
    :class="colors[color] ?? colors['info']"
  >
    <slot />
  </span>
</template>

<script setup>
defineProps({
  color: {
    type: String,
    default: "info",
  },
});

const colors = {
  info: "text-primary bg-blue-100", // blue,
  warning: "text-amber-500 bg-amber-100", // amber,
  error: "text-red-500 bg-red-100", // red,
  success: "text-green-500 bg-green-100", // green,
};
</script>
