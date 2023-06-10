<template>
  <layout-container class="py-20">
    <h1 class="text-4xl font-bold">Products</h1>
    <div class="flex justify-end">
      <custom-button>Add</custom-button>
    </div>
  </layout-container>

  <div>
    <layout-container class="">
      <div class="grid grid-cols-3 gap-6">
        <nuxt-link v-for="(item, index) in products" :key="index" :to="`${route.path}/${item.id}`">
          <layout-card>
            <h6 class="font-medium text-lg">{{ item.name }}</h6>
            <p class="text-sm text-gray-600 mt-2">
              {{ item.description }}
            </p>
            <hr class="my-2 border-gray-100" />
            <div class="flex">
              <p class="font-medium text-lg text-gray-700">Ksh. {{ item.price.toLocaleString() }}</p>
              <!-- <div class="flex-auto flex justify-end space-x-2">
                <custom-button>Edit</custom-button>
                <custom-button>Delete</custom-button>
              </div> -->
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

// name
// description
// price
// product_type_id
// payment_frequency_id


const {
  data: {
    value: { products },
  },
} = await useCustomFetch(`/entities/${id}/products`);
</script>
