<template>
  <component
    :is="preferredComponent"
    class="inline-flex justify-center items-center py-2 px-6 font-medium rounded whitespace-nowrap"
    :disabled="btnDisabled"
    :type="btnType"
    :to="to"
    :class="[colors[color], { 'w-full': block }]"
    @click="emitClick"
  >
    <slot />
  </component>
</template>
<script setup>
const props = defineProps({
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
  to: {
    type: String,
    default: null,
  },
});

const colors = {
  primary: "bg-primary text-white hover:bg-primary disabled:bg-blue-200",
  secondary: "bg-gray-500 text-white hover:gray-500 disabled:bg-gray-300",
  "outline-primary": "border border-primary text-primary hover:bg-blue-100 disabled:border-blue-200 disabled:border-blue-200",
  "outline-secondary": "border border-gray-500 text-gray-500 hover:bg-gray-100 disabled:border-gray-300 disabled:text-gray-300",
};

const components = {
  button: `button`,
  link: `router-link`,
};

const preferredComponent = computed(() =>
  !!props.to ? components["link"] : components[["button"]]
);

const btnType = computed(() => {
  !!props.to ? null : props.type;
});

const btnDisabled = computed(() => {
  !!props.to ? null : props.disabled;
});

const emit = defineEmits(["update:click"]);
function emitClick() {
  emit("update:click");
}
</script>
