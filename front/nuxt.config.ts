// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  runtimeConfig: {
    // Private keys are only available on the server
    public: {
      API_URL: process.env.API_URL || "http://localhost:8000/api",
    }
      
  },
  css: ["~/assets/scss/index.scss"],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
});
