<template>
  <layout-container class="py-20">
    <div class="flex align-center mb-10">
      <h1 class="text-4xl font-bold">
        {{ product.name }}
      </h1>
      <div class="flex-auto flex justify-end space-x-2">
        <custom-button color="outline-primary">Edit</custom-button>
        <custom-button>Delete</custom-button>
      </div>
    </div>

    <div>
      <div class="flex">
        <p class="text-gray-700">
          {{ product.type.name }}
        </p>
        <span class="font-bold text-gray-300 px-3">|</span>
        <p class="text-gray-700">{{ product.type.sector.name }}</p>
        <span class="font-bold text-gray-300 px-3">|</span>
        <p class="text-gray-700">
          {{ product.type.purchase_type.name }}
        </p>
        <span class="font-bold text-gray-300 px-3">|</span>
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
      <custom-tabs :loading="pending" :tabs="tabs">
        <template #tab-1>
          <custom-table :fields="purchaseFields" :items="purchases">
            <template #member="{ member }">
              <p class="font-medium">
                {{ member.name }}
              </p>

              <div class="text-gray-500 text-xs mt-1">
                <a
                  href="#"
                  v-for="(item, index) in [member.phone, member.email]"
                  :key="index"
                  class="px-1 first:border-l-0 first:pl-0 border-l"
                >
                  {{ item }}
                </a>
              </div>
            </template>
          </custom-table>
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

const tabs = ref([
  {
    label: "Purchases",
    key: "tab-1",
  },
]);

const purchaseFields = ref([
  {
    label: "Member",
    key: "member",
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
  pending,
  data: {
    value: { product, purchases },
  },
} = await useCustomFetch(`/entities/${entityId}/products/${productId}`);

// useCustomFetch(`/entities/${entityId}/products/${productId}`).then((res) => {
//   console.log(res.data.value.product);
// }).catch(err=>console.error(err));
</script>
