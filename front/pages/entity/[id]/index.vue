<template>
  <div class="py-20 bg-gray-100">
    <layout-container>
      <div class="flex items-center">
        <h1 class="text-4xl font-bold">{{ info.name }}</h1>
        <div class="ml-auto">
          <custom-button :to="`/entity/${id}/edit`" color="outline-primary"
            >Edit details</custom-button
          >
        </div>
      </div>
      <hr class="my-4" />
      <div class="flex">
        <p>{{ info.member_count }}: Members</p>
        <span class="text-gray-300 px-2">|</span>
        <p>Established {{ info.established }}</p>
      </div>
    </layout-container>
  </div>
</template>
<script setup>
const route = useRoute();
const id = route.params.id;
const info = {
  name: "Wakulima Sacco",
  member_count: 87,
  established: "May 1997",
};

onMounted(() => {
  //get entity data
});

const { loading, data: entity } = useCustomFetch(`/api/entity/${id}`);
</script>
