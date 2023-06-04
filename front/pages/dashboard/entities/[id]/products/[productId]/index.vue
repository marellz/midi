<template>
  <layout-container class="py-20">
    <div class="flex align-center mb-10">
      <h1 class="text-4xl font-bold">
        {{ product.name }}
      </h1>
      <div class="flex-auto flex justify-end space-x-2">
        <custom-button>Edit</custom-button>
        <custom-button>Delete</custom-button>
      </div>
    </div>

    <div>
      <div class="flex">
        <template v-for="(attr, index) in productAttributes" :key="index">
          <p v-html="attr(product[index])"></p>
          <span class="font-bold text-gray-300 px-3">|</span>
        </template>
      </div>
      <div class="mt-10">
        <p>
          {{ product.description }}
        </p>
      </div>
    </div>
    <!-- {{ product }} -->
  </layout-container>

  <div>
    <layout-container>
      <custom-tabs :tabs="tabs">
        <template #tab-1>
          <custom-table
            :fields="purchaseFields"
            :items="purchases"
          ></custom-table>
        </template>
      </custom-tabs>
    </layout-container>
  </div>
</template>
<script setup>
definePageMeta({
  layout: "entity-dash",
});

const route = useRoute();
const entityId = route.params.id;
const productId = route.params.productId;
const productAttributes = ref({
  price: (d) => `Ksh. ${d}`,
  entity_id: (d) => `Enitity name : ${d}`,
  product_type_id: (d) => `Product type : ${d}`,
});

const tabs = ref([
  {
    label: "Purchases",
    key: "tab-1",
  },
]);

const purchaseFields = ref([
  {
    label: "Member",
    key: "member_id",
  },
  {
    label: "Start date",
    key: "start_date",
  },
  {
    label: "End date",
    key: "start_date",
  },
]);

const {
  data: {
    value: { product, purchases },
  },
} = await useCustomFetch(`/entities/${entityId}/products/${productId}`);

// useCustomFetch(`/entities/${entityId}/products/${productId}`).then((res) => {
//   console.log(res.data.value.product);
// }).catch(err=>console.error(err));
</script>
