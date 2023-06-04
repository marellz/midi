<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold">Loans</h1>
    <div class="flex justify-end">
      <custom-button>Add</custom-button>
    </div>
  </layout-container>
  <div>
    <layout-container>
      <div class="grid grid-cols-2">
        <nuxt-link
          v-for="item in loans"
          :key="item.id"
          :to="`${route.path}/${item.id}`"
        >
          <layout-card>
            <div class="flex items-center">
              <h6 class="font-medium text-lg">{{ item.name }}</h6>
              <div class="px-3">
                <span class="text-xs font-medium px-2 py-1 rounded-lg bg-blue-600 text-white">
                  {{ item.rate_pa }}% PA
                </span>
              </div>
            </div>
            <p class="text-sm text-gray-600 mt-2">
              {{ item.details }}
            </p>
            <hr class="my-2" />
            <div class="flex space-x-2">
              <p class="font-medium text-lg text-gray-700">
                Ksh. {{ item.min_amount }} - {{ item.max_amount }}
              </p>
              <p class="font-medium text-lg text-gray-700">Duration: {{ item.purchase_duration_id }}</p>
            </div>
          </layout-card>
        </nuxt-link>
      </div>
    </layout-container>
  </div>
</template>
<script setup>
definePageMeta({
  layout: "entity-dash",
});

const route = useRoute();
const id = route.params.id;

const {
  data: {
    value: { loans },
  },
} = await useCustomFetch(`/entities/${id}/loans`);
</script>
