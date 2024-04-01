<template>
  <div class="h-full flex flex-col">
    <header>
        <layout-container class="py-10">
            <div class="">
                <nuxt-link to="/" class="inline-block">
                    <img src="@/assets/images/logo.svg" alt="">
                </nuxt-link>

            </div>
        </layout-container>
    </header>
    <main class="flex-auto">
        <layout-container class="py-20">
            <div class="flex justify-center">
                <div class="w-96 mt-10 py-10">
                    <slot />
                </div>
            </div>
        </layout-container>
    </main>
    <footer>
        <layout-container class="py-10">
            <hr class="border-gray-100 mb-5">
            <p class="font-medium">All rights reserved &mdash; {{ year }}</p>
        </layout-container>
    </footer>
  </div>
</template>
<script setup>
definePageMeta({
  name: "BlankPage",
});
const date = new Date()
const year = date.getFullYear()
</script>
