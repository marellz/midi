<template>
  <layout-container class="py-20">
    <div class="flex items-center">
      <h1 class="text-4xl font-bold flex-auto">Loans</h1>
      <div class="flex justify-end">
        <custom-button>Add</custom-button>
      </div>
    </div>
  </layout-container>
  <div>
    <layout-container>
      <div class="grid grid-cols-3">
        <nuxt-link
          v-for="item in loans"
          :key="item.id"
          :to="`${route.path}/${item.id}`"
        >
          <layout-card>
            <div class="flex items-center">
              <h6 class="font-medium text-xl">{{ item.name }}</h6>
              <div class="px-3">
                <span
                  class="text-xs font-medium px-2 py-1 rounded-lg bg-blue-600 text-white"
                >
                  {{ item.rate_pa }}% PA
                </span>
              </div>
            </div>
            <!-- <p class="text-sm text-gray-600 mt-2">
              {{ item.details }}
            </p>
            <hr class="my-2" />
          -->
            
            <div class="mt-2 text-lg text-gray-700">
              <div class="">
                Borrow from:
                <br />
                <span class="font-medium">
                  Ksh. {{ item.min_amount.toLocaleString() }} -
                  {{ item.max_amount.toLocaleString() }}
                </span>
              </div>
              <div class="mt-2">
                For up to
                <br>
                <span class="font-medium">
                  {{ item.purchase_duration.label }}
                </span>
              </div>
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
