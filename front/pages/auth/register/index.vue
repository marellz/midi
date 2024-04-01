<template>
  <div class="">
    <form @submit.prevent="register">
      <h1 class="text-4xl font-semibold mb-7">Register</h1>
      <form-input required label="Name" v-model="user.name" />
      <form-input required label="Phone number" v-model="user.phone" />
      <form-input required label="Email address" v-model="user.email" />
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
      <div class="my-7">
        <custom-button block>Submit</custom-button>
      </div>
    </form>
    <div class="py-4">
      <p>
        Have an account?
        <nuxt-link to="/auth/login" class="text-primary">Login</nuxt-link>
      </p>
    </div>
  </div>
</template>

<script setup>
const user = ref({
  name: "",
  phone: "",
  email: "",
  password: "",
  password_confirmation: "",
});

definePageMeta({
  layout: "auth",
});
</script>
