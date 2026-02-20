<script setup>
  import api from '@/services/api'
  import { ref, onMounted } from 'vue';

  import GameCard from './elements/GameCard.vue';

  const games = ref()
  const gamesCount = ref(0)

  async function loadLibrary(){
    try{
      const { data: gamesData } = await api.get('/api/get_owned_games')
      games.value = gamesData.games
      gamesCount.value = gamesData.games_count
      console.log(gamesData.games)
    }
    catch(e){}
  }

  onMounted(async () => {
    loadLibrary()
  })
</script>

<template>
  <!-- {{ games }} -->
    <main class="px-8 py-3">
      <GameCard
        v-if="games"
        v-for="(game, index) in games"
        :id="game.appid"
        :name="game.name"
        :playtimeForever="game.playtime_forever"
        :imgIconUrl="game.img_icon_url"
        :imgCapsuleUrl="game.img_capsule_url"
        :imgHeaderUrl="game.img_header_url"
      />
    </main>
</template>