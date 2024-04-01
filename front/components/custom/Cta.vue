<template>
  <NuxtLink
    :to="to"
    class="inline-flex items-center px-3 py-2 rounded"
    :class="[color]"
    @click.prevent="() => $emit('click')"
  >
    <p class="font-medium">
      <slot />
    </p>
    <arrow-long-right-icon class="ml-2 flex-none h-6" />
  </NuxtLink>
</template>

<script setup>
import { ArrowLongRightIcon } from "@heroicons/vue/24/solid";
defineProps({
  to: {
    type: String,
    default: "#",
  },
  color: {
    type: String,
    default: "text-primary hover:bg-blue-100",
  },
});

defineEmits(["click"]);
</script>
