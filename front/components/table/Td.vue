<template>
  <td
    class="border-b first:border-l last:border-r align-middle text-sm border-gray-100 px-3 py-2 text-gray-700"
    @click="() => $emit('click')"
  >
    <span>
      <slot />
    </span>
  </td>
</template>
<script setup>
defineEmits(["click"]);
</script>
