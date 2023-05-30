<template>
  <div class="app">
    <header class="py-4 bg-gray-100">
      <div class="container mx-auto">
        <div class="">
          <ul class="flex items-center justify-end">
            <li v-for="(link, index) in links" :key="index" class="px-3">
              <nuxt-link class="" :to="link.path">{{ link.label }}</nuxt-link>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <main>
      <slot />
    </main>
    <footer></footer>
  </div>
</template>
<script setup>
const links = ref([
  { label: "Home", path: "/" },
  { label: "Login", path: "/login" },
  { label: "Register", path: "/register" },
]);
</script>
