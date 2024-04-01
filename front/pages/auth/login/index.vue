<template>
  <div class="">
    <form @submit.prevent="login">
      <h1 class="text-4xl font-semibold mb-7">Login</h1>
      <form-input required label="Email/Phone" v-model="user.identifier" />
      <form-input
        required
        label="Password"
        type="password"
        v-model="user.password"
      />

      <form-checkbox v-model:checked="rememberMe">Rememeber me</form-checkbox>

      <custom-button block>Login</custom-button>
    </form>

    <div class="py-4 mt-5">
      <p class="">
        Not a member?
        <nuxt-link to="/auth/register" class="text-primary">Register</nuxt-link>
      </p>
    </div>
  </div>
</template>

<script setup>
const user = ref({
  identifier: "",
  password: "",
});

const rememberMe = ref(false);

definePageMeta({
  layout: "auth",
});
</script>
