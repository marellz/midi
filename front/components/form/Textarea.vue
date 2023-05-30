<template>
  <div class="flex flex-col">
    <slot name="label">
      <label v-if="label" :for="id">
        <h3 class="text-xl font-bold mb-5">
          {{ label }}
        </h3>
      </label>
    </slot>
    <textarea
      :id="id"
      v-model="mValue"
      class="py-4 px-5 rounded border border-7983d5 text-sm leading-6 placeholder:italic placeholder:text-black resize-none block w-full"
      :class="inputClass"
      :rows="rows"
      :name="name"
      :disabled="disabled"
      :readonly="readonly"
      :placeholder="placeholder"
    ></textarea>
  </div>
</template>
<script lang="ts" setup>
const props = defineProps({
  modelValue: {
    type: [String, Number],
    default: "",
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
    default: "",
  },
  inputClass: {
    type: String,
    default: "",
  },
  rows: {
    type: [Number, String],
    default: 10,
  },
})

const emit = defineEmits(["update:model-value"])
const id = Math.random().toString(36).substring(7)
const mValue = computed({
  get: () => props.modelValue,
  set: (v) => {
    emit("update:model-value", v)
  },
})
</script>
