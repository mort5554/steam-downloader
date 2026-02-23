<script setup>
  import api from '@/services/api'
  import { ref, onMounted } from 'vue'

  import GameCard from './elements/GameCard.vue'
  import GameCardSkeleton from './elements/GameCardSkeleton.vue'

  const games = ref()

  async function loadDownloadedGames(){
    games.value = null
    try{
      const { data: gamesData } = await api.get(`/api/installed_games`)
      games.value = gamesData

      console.log(games.value)
    }
    catch(e){}
  }

  onMounted(async () => {
    loadDownloadedGames()
  })
</script>

<template>
  <main class="px-8 py-3">
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