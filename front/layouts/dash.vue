<template>
  <div class="app h-[100vh]">
    <div class="flex h-full">
      <div class="w-64 flex-none py-4 px-1 bg-gray-100">
        <div class="px-5 mt-10">
          <nuxt-link to="/" class="d-block w-2/3 mx-auto">
            <img src="@/assets/images/logo.svg" alt="" />
          </nuxt-link>
        </div>
        <ul class="mt-20">
          <li v-for="(link, i) in links" :key="i" class="mb-1">
            <router-link
              class="block px-4 py-3 text-sm text-gray-800 hover:bg-blue-100 rounded-lg font-medium"
              :class="{
                '!bg-blue-400 !text-white': routeMatches(link.path, i === 0),
              }"
              :to="link.path"
            >
              {{ link.label }}
            </router-link>
          </li>
        </ul>
      </div>
      <div class="flex-auto overflow-auto pb-20">
        <slot />
      </div>
    </div>
  </div>
</template>
<script setup>
definePageMeta({
  name: "Dashboard",
});

const route = useRoute();
const links = [
  { label: "Home", path: `/dashboard`, index: true },
  { label: "Entities", path: "/dashboard/entities" },
  { label: "Global products", path: "/dashboard/global-products" },
  { label: "Users", path: "/dashboard/users" },
];
const routeMatches = (path, isIndex) => {
  // so that it doesn't label index pages coz it has base url
  if (isIndex) {
    return route.path === links[0].path;
  } else {
    return path === route.path || route.path.includes(path);
  }
};
</script>
