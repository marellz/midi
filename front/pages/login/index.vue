<template>
  <div class="mt-10 w-96 p-3 border border-gray-200 rounded">
    <form @submit.prevent="login">
      <h1 class="text-4xl font-bold my-5">Login</h1>
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

    <div class="py-4">
      <p>
        Not a member?
        <nuxt-link to="/register" class="text-blue-500">Register</nuxt-link>
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
  layout: "blank",
});
</script>
