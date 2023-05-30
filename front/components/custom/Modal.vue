<template>
  <div class="fixed inset-0 z-[1000]" :class="{ visible, invisible: !visible }">
    <!-- backdrop -->
    <div
      class="inset-0 fixed bg-black opacity-30"
      @click="$emit('update:visible', false)"
    ></div>
    <!-- modal -->
    <div class="relative z-[100]">
      <slot name="card">
        <div
          class="bg-white py-10 px-[50px] shadow-form rounded-[10px] w-4/5 max-w-[947px] mx-auto mt-[168px] relative"
        >
          <div>
            <h1 v-if="modalTitle" class="leading-[42px] text-[30px] bold">
              {{ modalTitle }}
            </h1>
            <h3 v-if="subTitle" class="text-xl leading-7 font-medium">
              {{ subTitle }}
            </h3>
            <button
              class="inline-flex items-center absolute top-[30px] right-[30px]"
              @click="$emit('update:visible', false)"
            >
              <span class="mr-2 text-sm leading-4"> Fermer </span>
              <img src="@/assets/icons/feather-x-circle.svg" alt="" />
            </button>
          </div>

          <div class="max-h-[70vh] overflow-auto h-full pr-10">
            <slot />
          </div>
        </div>
      </slot>
    </div>
  </div>
</template>
<script lang="ts" setup>
defineProps({
  visible: {
    type: Boolean,
    default: false,
  },
  modalTitle: {
    type: String,
    default: null,
  },
  subTitle: {
    type: String,
    default: null,
  },
})

defineEmits(["update:visible"])
</script>
