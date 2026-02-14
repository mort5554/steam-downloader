<script setup>
import themeToggler from './elements/themeToggler.vue';
</script>

<template>
  <nav class="w-full flex justify-evenly bg-blue-400 dark:bg-blue-600 dark:text-white font-bold text-xl py-9 uppercase">
    <div>
      Biblioteka
    </div>
    <div>
      Zainstalowane
    </div>
    <div>
      Komputer
    </div>
    <div class="flex justify-end">
      <themeToggler/>
    </div>
  </nav>
</template>