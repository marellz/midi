<template>
  <ul class="flex">
    <li v-for="(tab, index) in tabs" :key="index" class="py-1">
      <button
        type="button"
        @click="activeTab = tab.key"
        class="border-b-2 border-b-gray-100 text-gray-500 font-medium px-8 py-2"
        :class="{ '!border-b-primary !text-primary': activeTab == tab.key }"
      >
        {{ tab.label }}
      </button>
    </li>
  </ul>

  <div
    v-for="(tab, index) in tabs"
    :key="index"
    v-show="activeTab == tab.key"
    class="px-3 pt-10"
  >
    <slot :name="tab.key"></slot>
  </div>
</template>
<script setup>
const props = defineProps({
  tabs: {
    type: String,
    required: true,
  },
  defaultTab: {
    type: String,
    default: "tab-1",
  },
});

const activeTab = ref(props.defaultTab);
</script>
