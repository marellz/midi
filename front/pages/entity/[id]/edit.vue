<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold">Edit entity</h1>
    <form @submit.prevent="update">
      <div class="text-right">
        <custom-button>Save changes</custom-button>
      </div>
    </form>
  </layout-container>
</template>

<script setup>
const entityData = ref({});
onMounted(() => {
  //get entity data
});

const update = async () => {
  // post data
};
</script>
