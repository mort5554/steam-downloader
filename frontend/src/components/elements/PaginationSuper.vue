<script setup>

const props = defineProps({
  lastPage: { type: Number, default: 1 },
  currentPage: { type: Number, default: 1 },
})

const emit = defineEmits(['update:changePage'])

function goTo(page){
  if (!page || page === props.currentPage) return
  if (page > props.lastPage) return
  console.log(page)
  emit('update:changePage', page)
}
</script>

<template>
  <div class="flex items-center justify-between px-4 py-3 sm:px-6">
    <div class="text-black dark:text-white mr-10">
      Strona {{ currentPage }} z {{ lastPage }}
    </div>

    <div class="flex flex-1 justify-between sm:hidden">
      <a
        @click.prevent="goTo(currentPage - 1)"
        class="relative inline-flex items-center rounded-md border  bg-white px-4 py-2 text-sm font-medium text-black hover:bg-yellow-50"
      >
        Poprzednia
      </a>

      <a
        @click.prevent="goTo(currentPage + 1)"
        class="relative ml-3 inline-flex items-center rounded-md border bg-white px-4 py-2 text-sm font-medium text-black hover:bg-gray-100"
      >
        Następna
      </a>
    </div>

    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
      <div>
        <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-xs">
          <a
            @click.prevent="goTo(currentPage - 1)"
            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-black dark:text-white inset-ring inset-ring-black dark:inset-ring-white hover:bg-blue-400 focus:z-20 focus:outline-offset-0 cursor-pointer"
          >
            <span class="sr-only">Poprzednia</span>
            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
              <path d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
          </a>

          <a
            @click.prevent="goTo(1)"
            :class="currentPage == 1 ? 'bg-blue-400' : ''"
            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-black dark:text-white inset-ring inset-ring-black dark:inset-ring-white hover:bg-blue-400 focus:z-20 focus:outline-offset-0 cursor-pointer"
          >
            1
          </a>

          <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-black dark:text-white inset-ring inset-ring-black dark:inset-ring-white focus:outline-offset-0">...</span>

          <a
            @click.prevent="goTo(lastPage)"
            :class="currentPage == lastPage ? 'bg-blue-400' : ''"
            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-black dark:text-white inset-ring inset-ring-black dark:inset-ring-white hover:bg-blue-400 focus:z-20 focus:outline-offset-0 cursor-pointer"
          >
            {{ lastPage }}
          </a>

          <a
            @click.prevent="goTo(currentPage + 1)"
            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-black dark:text-white inset-ring inset-ring-black dark:inset-ring-white hover:bg-blue-400 focus:z-20 focus:outline-offset-0 cursor-pointer"
          >
            <span class="sr-only">Następna</span>
            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-5">
              <path d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
          </a>
        </nav>
      </div>
    </div>
  </div>
</template>