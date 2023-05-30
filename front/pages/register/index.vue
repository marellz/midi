<template>
  <div class="mt-10 w-96 p-3 border border-gray-200 rounded">
    <form @submit.prevent="register">
      <h1 class="text-4xl font-bold my-5">Register</h1>
      <form-input required label="Name" v-model="user.name" />
      <form-input required label="Email/Phone" v-model="user.identifier" />
      <form-input
        required
        label="Password"
        type="password"
        v-model="user.password"
      />
      <form-input
        required
        label="Confirm password"
        type="password"
        v-model="user.confirm_password"
      />
      <custom-button block>Submit</custom-button>
    </form>
    <div class="py-4">
      <p>
        Have an account?
        <nuxt-link to="/login" class="text-blue-500">Login</nuxt-link>
      </p>
    </div>
  </div>
</template>

<script setup>
const user = ref({
  name: "",
  identifier: "",
  password: "",
  password_confirmation: "",
});

definePageMeta({
  layout: "blank",
});
</script>
