<script setup>
  import api from '@/services/api'
  import { ref, onMounted, watch } from 'vue';

  import GameCard from './elements/GameCard.vue';
  import SearchBar from './elements/SearchBar.vue';

  const games = ref()
  const gamesCount = ref(0)

  const searchValue = ref('')

  async function loadLibrary(){
    try{
      const { data: gamesData } = await api.get(`/api/get_owned_games?search=${searchValue.value}`)
      games.value = gamesData.games
      gamesCount.value = gamesData.games_count
      console.log(gamesData.games)
    }
    catch(e){}
  }

  watch(searchValue, function(){
    loadLibrary()
  })

  onMounted(async () => {
    loadLibrary()
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
        :id="game.appid"
        :name="game.name"
        :playtimeForever="game.playtime_forever"
        :imgIconUrl="game.img_icon_url"
        :imgCapsuleUrl="game.img_capsule_url"
        :imgHeaderUrl="game.img_header_url"
      />
    </main>
</template>