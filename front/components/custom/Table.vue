<template>
  <table class="table border-separate border-spacing-y-2 w-full">
    <thead>
      <tr>
        <th
          v-for="(field, index) in fields"
          :key="`th-${index}`"
          class="bg-gray-200 p-2 first:rounded-l last:rounded-r text-left"
        >
          <span class="text-sm font-bold text-gray-500">
            {{ field.label }}
          </span>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="(item, index) in items"
        :key="`tr-${index}`"
        class="hover:bg-gray-100"
      >
        <td
          v-for="(field, i) in fields"
          :key="`td-${i}`"
          :width="field.width"
          class="align-middle text-sm first:rounded-l last:rounded-r"
        >
          <slot :name="field.key" v-bind="item">
            <a
              href="#"
              class="block px-3 py-2"
              @click.prevent="() => $emit('row-click', item[rowKey])"
            >
              {{ item[field.key] }}
            </a>
          </slot>
        </td>
      </tr>
    </tbody>
  </table>
</template>
<script setup>
defineProps({
  fields: {
    type: Array,
    default: () => [],
  },
  items: {
    type: Array,
    default: () => [],
  },
  rowKey: {
    type: String,
    default: "id",
  },
});

defineEmits(["row-click"]);
</script>
