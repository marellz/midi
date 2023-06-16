<template>
  <div class="app">
    <header class="py-4 bg-gray-100">
      <layout-container>
        <div class="flex items-center">
          <nuxt-link to="/" class="d-block" >
            <img src="@/assets/images/logo.svg" alt="">
          </nuxt-link>
          <ul class="flex items-center justify-end ml-auto">
            <li v-for="(link, index) in links" :key="index" class="px-3">
              <nuxt-link class="" :to="link.path">{{ link.label }}</nuxt-link>
            </li>
          </ul>
        </div>
      </layout-container>
    </header>
    <main>
      <slot />
    </main>
    <footer></footer>
  </div>
</template>
<script setup>
const authenticatedLinks = ref([
  // { label: "Home", path: "/" },
  { label: "Dashboard", path: "/dashboard/entities" },
]);

const guestLinks = [
  { label: "Login", path: "/auth/login" },
  { label: "Register", path: "/auth/register" },
]

const auth = ref(true)

const links = computed(()=> auth.value ? authenticatedLinks.value : guestLinks.value )
</script>
