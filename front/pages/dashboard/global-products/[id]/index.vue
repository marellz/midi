<template>
  <layout-container class="py-20">
    <div class="flex items-center">
      <div>
        <h1 class="text-4xl font-bold">{{ product.name }}</h1>
        <div class="mt-2">
          <p>
            by
            <nuxt-link :to="`/global-brand/${id}`" class="font-medium">
              brand {{ product.global_brand_id }}</nuxt-link
            >
          </p>
        </div>
      </div>
      <div class="flex space-x-2 ml-auto">
        <custom-button>Talk to an agent</custom-button>
      </div>
    </div>
  </layout-container>
  <div>
    <layout-container>
      <div class="flex flex-wrap text-sm font-medium text-gray-500">
        <span class="pr-3 mr-2 mb-2 border-r border-gray-2 py-1">
          Purchase type:
          {{ product.purchase_type_id }}
        </span>
        <span class="pr-3 mr-2 mb-2 border-r border-gray-2 py-1">
          Sector:
          {{ product.sector_id }}
        </span>

        <span class="pr-3 mr-2 mb-2 border-r border-gray-2 py-1">
          Fee:
          {{ product.fee }}

          <template v-if="product.fee_max">
            <span class="px-2">-</span>
            {{ product.fee_max }}
          </template>
        </span>
      </div>
      <p class="leading-7 mt-5">
        {{ product.description }}
      </p>
    </layout-container>
  </div>
</template>

<script setup>
definePageMeta({
  name: "GlobalProduct",
  layout: "dash",
});

const route = useRoute();
const id = route.params.id;

const {
  data: {
    value: { product },
  },
} = await useCustomFetch(`/global-products/${id}`);
</script>
