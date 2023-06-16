<template>
  <div class="flex flex-col mb-2">
    <label :for="id" class="text-sm font-medium mb-2 text-gray-700">
      <slot>
        <p class="m-0">
          {{ label }}
        </p>
      </slot>
    </label>
    <input
      :id="id"
      v-model="mValue"
      class="text-sm outline-none border border-gray-300 h-10 px-3 rounded focus:ring-2 focus:ring-blue-500 bg-transparent"
      :type="inputType"
      :name="name"
      :required="required"
      :disabled="disabled"
      :readonly="readonly"
      :placeholder="placeholder"
    />

    <div v-if="error" class="mt-2 text-xs text-red-500">
      <p class="my-0">{{ error }}</p>
    </div>

    <slot name="help">
      <div class="mt-2 text-xs">
        {{ help }}
      </div>
    </slot>
  </div>
</template>
<script setup lang="ts">
const props = defineProps({
  modelValue: {
    type: [String, Number, Boolean, Object],
    default: "",
  },
  inputType: {
    type: String,
    default: "text",
  },
  name: {
    type: String,
    default: "",
  },
  label: {
    type: String,
    default: null,
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  required: {
    type: Boolean,
    default: false,
  },
  readonly: {
    type: Boolean,
    default: false,
  },
  placeholder: {
    type: String,
    default: null,
  },
  help: {
    type: String,
    default: null,
  },
  hint: {
    type: String,
    default: null,
  },
  error: {
    type: String,
    default: null,
  },
});

const emit = defineEmits(["update:model-value"]);
const id = Math.random().toString(36).substring(7);
const mValue = computed({
  get: () => props.modelValue,
  set: (v) => {
    emit("update:model-value", v);
  },
});
</script>
