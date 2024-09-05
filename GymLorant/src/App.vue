<script setup>
import HelloWorld from './components/HelloWorld.vue'
</script>

<template>
  <div class="bg-yellow-500 text-white p-4">
    <h1 class="text-2xl font-bold">¡Hola, Tailwind con Vue.js!</h1>
    <p>Esto es un ejemplo usando Tailwind CSS en un proyecto Vue.js.</p>

    q emocion
  </div>
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
