<template>
  <div class="relative h-[70vh] flex flex-col justify-center">
    <img src="@/assets/images/frontpage.jpg" class="absolute h-full w-full object-cover" alt="" />
    <span class="absolute h-full w-full bg-gray-800 opacity-50"></span>
    <layout-container class="py-20 relative text-white">
        <div class="grid grid-cols-2">
            <div >
                <h1 class="text-4xl font-bold mb-5">Community</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci accusantium voluptatibus aliquid itaque quisquam debitis eaque? Culpa reprehenderit doloremque sequi illo corrupti magnam ea, officia deleniti, totam labore et voluptate?</p>
                <div class="mt-5">
                    <custom-button>
                        <span>Do something</span>
                        <ArrowLongRightIcon class="h-5 ml-3"/>
                    </custom-button>
                </div>
            </div>
        </div>
    </layout-container>
  </div>
  <div>
    <layout-container>
      <div class="py-20">
        <h1 class="text-4xl font-bold">Global products</h1>
      </div>
      <div class="grid grid-cols-2 gap-6">
        <nuxt-link
          v-for="item in products"
          :key="item.id"
          :to="`/global-products/${item.id}`"
        >
          <layout-card>
            <h5 class="text-xl font-bold">{{ item.name }}</h5>
            <div class="flex flex-wrap text-sm font-medium text-gray-500 mt-5">
              <span class="pr-3 mr-2 mb-2 border-r border-gray-2 py-1">
                Purchase type:
                {{ item.purchase_type_id }}
              </span>
              <span class="pr-3 mr-2 mb-2 border-r border-gray-2 py-1">
                Sector:
                {{ item.sector_id }}
              </span>

              <span class="pr-3 mr-2 mb-2 border-r border-gray-2 py-1">
                Fee:
                {{ item.fee }}

                <template v-if="item.fee_max">
                  <span class="px-2">-</span>
                  {{ item.fee_max }}
                </template>
              </span>
            </div>
            <p class="mt-5 text-gray-600">
              {{ item.description }}
            </p>
            <p class="font-medium mt-5">by Brand {{ item.global_brand_id }}</p>
          </layout-card>
        </nuxt-link>
      </div>
    </layout-container>
  </div>
</template>
<script setup>
import { ArrowLongRightIcon } from '@heroicons/vue/24/solid';

definePageMeta({
  name: "GlobalProducts",
  layout: "home",
});

const route = useRoute();

const {
  data: {
    value: { products },
  },
} = await useCustomFetch(`/global-products`);
</script>
