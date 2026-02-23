<script setup>
  import { RouterLink, useRoute } from 'vue-router';
  import ThemeToggler from './elements/ThemeToggler.vue';

  const route = useRoute()
</script>

<template>
  <nav class="w-full flex justify-evenly bg-blue-400 dark:bg-blue-600 dark:text-white font-bold text-xl py-9 uppercase">
    <RouterLink :to="{ name: 'Library' }">
      <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer" :class="route.name == 'Library' ? 'bg-blue-300 dark:bg-blue-400' : ''">
        Biblioteka
      </div>
    </RouterLink>
    <RouterLink :to="{ name: 'Downloaded' }">
      <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer" :class="route.name == 'Downloaded' ? 'bg-blue-300 dark:bg-blue-400' : ''">
          Zainstalowane
      </div>
    </RouterLink>
    <RouterLink :to="{ name: 'Computer' }" :class="route.name == 'Computer' ? 'bg-blue-300 dark:bg-blue-400' : ''">
      <div class="hover:bg-blue-300 py-2 px-3 border-2 rounded-xl cursor-pointer">
        Komputer
      </div>
    </RouterLink>
    <div class="flex justify-end">
      <ThemeToggler/>
    </div>
  </nav>
</template>