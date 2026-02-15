<script setup>
import { RouterLink } from 'vue-router';
import themeToggler from './elements/themeToggler.vue';
</script>

<template>
  <nav class="w-full flex justify-evenly bg-blue-400 dark:bg-blue-600 dark:text-white font-bold text-xl py-9 uppercase">
    <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer">
      <RouterLink :to="{ name: 'Library' }">
        Biblioteka
      </RouterLink>
    </div>
    <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer">
      <RouterLink :to="{ name: 'Downloaded' }">
        Zainstalowane
      </RouterLink>
    </div>
    <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer">
      <RouterLink :to="{ name: 'Computer' }">
        Komputer
      </RouterLink>
    </div>
    <div class="flex justify-end">
      <themeToggler/>
    </div>
  </nav>
</template>