<script setup>
</script>

<template>
  <div class="relative w-full h-24 mt-3 rounded-xl overflow-hidden border-3 border-blue-200 dark:border-blue-800 animate-pulse">
    <div class="absolute inset-0 bg-gray-300 dark:bg-gray-700"></div>

    <div class="absolute inset-0 backdrop-blur-xl bg-white/20 dark:bg-black/40"></div>

    <div class="relative flex items-center h-full px-4 gap-4">
      <div class="w-16 h-16 rounded-lg bg-gray-300 dark:bg-gray-600"></div>
      <div class="flex flex-col gap-2 w-full">
        <div class="h-5 w-1/5 rounded bg-gray-300 dark:bg-gray-600"></div>
        <div class="h-4 w-1/8 rounded bg-gray-300 dark:bg-gray-600"></div>
      </div>
    </div>
  </div>
</template>