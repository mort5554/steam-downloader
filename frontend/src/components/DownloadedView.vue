<script setup>
  import api from '@/services/api'
  import { ref, onMounted, watch } from 'vue'

  import GameCard from './elements/GameCard.vue'
  import GameCardSkeleton from './elements/GameCardSkeleton.vue'
  import SearchBar from './elements/SearchBar.vue'

  let debounceTimer = null

  const games = ref()

  const searchValue = ref('')

  async function loadDownloadedGames(){
    games.value = null
    try{
      const { data: gamesData } = await api.get(`/api/installed_games?search=${searchValue.value}`)
      games.value = gamesData

      console.log(games.value)
    }
    catch(e){}
  }

  watch(searchValue, () => {
    clearTimeout(debounceTimer)

    debounceTimer = setTimeout(() => {
      loadDownloadedGames()
    }, 600)
  })

  onMounted(async () => {
    loadDownloadedGames()
  })
</script>

<template>
  <main class="px-8 py-3">
    <div class="w-full h-20 flex items-center pl-10 bg-blue-300 dark:bg-blue-500 rounded">
        <div class="w-60">
          <SearchBar v-model:searchValue="searchValue"/>
        </div>
      </div>
    <GameCard
      v-if="games"
      v-for="(game, index) in games"
      :key="game.appid"
      :name="game.name"
      :imgHeaderUrl="game.img_header_url"
      :imgIconUrl="game.img_header_url"
      :size="game.size"
    />
    <GameCardSkeleton v-else v-for="i in 10"/>
  </main>
</template>