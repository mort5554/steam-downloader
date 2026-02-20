<script setup>
import { RouterLink } from 'vue-router';
import ThemeToggler from './elements/ThemeToggler.vue';
</script>

<template>
  <nav class="w-full flex justify-evenly bg-blue-400 dark:bg-blue-600 dark:text-white font-bold text-xl py-9 uppercase">
    <RouterLink :to="{ name: 'Library' }">
      <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer">
        Biblioteka
      </div>
    </RouterLink>
    <RouterLink :to="{ name: 'Downloaded' }">
      <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer">
          Zainstalowane
      </div>
    </RouterLink>
    <RouterLink :to="{ name: 'Computer' }">
      <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer">
        Komputer
      </div>
    </RouterLink>
    <div class="flex justify-end">
      <ThemeToggler/>
    </div>
  </nav>
</template>