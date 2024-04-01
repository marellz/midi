/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./nuxt.config.{js,ts}",
    "./app.vue",
  ],
  theme: {
    extend: {
      colors: {
        "custom-gray": "#cac4ceff",
        linen: "#f7ece1ff",
        primary: "#0fa3b1ff",
        dark: "#414361ff",
        darker: "#2a2d43ff",
      },
    },
  },
  plugins: [],
};
