<script setup>
import { useTheme } from '@/../useTheme.js'

const { theme, toggleTheme } = useTheme()
</script>


<template>
  <button
  class="p-3 rounded-full hover:bg-white/20 dark:hover:bg-black/20 cursor-pointer"
  type="button"
  title="Toggle theme"
  aria-label="Toggle theme"
  @click="toggleTheme"
>
  <template v-if="theme === 'dark'">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
      <path d="M17.293 13.293A8 8 0 116.707 2.707a7 7 0 1010.586 10.586z" />
    </svg>
  </template>
  <template v-else>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.36 6.36-1.42-1.42M7.05 6.64 5.64 5.22m0 13.56 1.41-1.41M18.36 5.64l-1.41 1.41M12 7a5 5 0 100 10 5 5 0 000-10z" />
    </svg>
  </template>
  </button>
</template>