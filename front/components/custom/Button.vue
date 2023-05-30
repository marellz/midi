<template>
  <button
    class="inline-flex justify-center items-center py-2 px-6 font-medium rounded"
    :disabled="disabled"
    :type="type"
    :class="[ colors[color], { 'w-full': block }]"
    @click="emitClick"
  >
    <slot />
  </button>
</template>
<script setup>
defineProps({
  type: {
    type: String,
    default: null,
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  block: {
    type: Boolean,
    default: false,
  },
  color: {
    type: String,
    default: "primary",
  },
});

const colors = {
  primary: "bg-blue-500 text-white hover:blue-300 disabled:bg-blue-200",
};
const emit = defineEmits(["update:click"]);
function emitClick() {
  emit("update:click");
}
</script>
