<template>
  <div class="inline-flex items-center">
    <input
      :id="id"
      v-model="val"
      class="checkbox"
      type="checkbox"
      :value="inputValue"
    />
    <label :for="id" class="checkbox-label" :class="labelClass">
      <div class="checkbox-content">
        <slot>
          <p>
            {{ label }}
          </p>
        </slot>
      </div>
    </label>
  </div>
</template>
<script setup lang="ts">
const props = defineProps({
  checked: {
    type: [Boolean, Array],
    default: false,
  },
  inputValue: {
    type: [String, Boolean, Number],
    default: true,
  },
  label: {
    type: String,
    default: null,
  },
  labelClass: {
    type: String,
    default: "",
  },
});

const emit = defineEmits(["update:checked"]);
const id = Math.random().toString(36).substring(7);
const val = computed({
  get: () => props.checked,
  set: (v) => {
    emit("update:checked", v);
  },
});
</script>
