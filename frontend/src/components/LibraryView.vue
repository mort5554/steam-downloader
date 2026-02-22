<script setup>
  import api from '@/services/api'
  import { ref, onMounted, watch } from 'vue'

  import GameCard from './elements/GameCard.vue'
  import SearchBar from './elements/SearchBar.vue'
  import PaginationSuper from './elements/PaginationSuper.vue'

  let debounceTimer = null

  const games = ref()
  const gamesCount = ref(0)

  const currentPage = ref(1)
  const lastPage = ref(1)
  const page = ref(1)

  const searchValue = ref('')

  async function loadLibrary(){
    games.value = null
    try{
      const { data: gamesData } = await api.get(`/api/get_owned_games?search=${searchValue.value}&page=${page.value}`)
      currentPage.value = gamesData['current_page']
      lastPage.value = gamesData['last_page']
      games.value = gamesData['data']
      console.log(gamesData)
      gamesCount.value = gamesData.games_count
    }
    catch(e){}
  }

  watch([searchValue, page], () => {
    clearTimeout(debounceTimer)

    debounceTimer = setTimeout(() => {
      loadLibrary()
    }, 600)
  })

  watch(searchValue, () => {
    page.value = 1
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
        :key="game.appid"
        :name="game.name"
        :playtimeForever="game.playtime_forever"
        :imgIconUrl="game.img_icon_url"
        :imgCapsuleUrl="game.img_capsule_url"
        :imgHeaderUrl="game.img_header_url"
      />
      <div class="w-full h-20 flex items-center pl-10 mt-4 bg-blue-300 dark:bg-blue-500 rounded">
        <PaginationSuper :lastPage="lastPage" :currentPage="currentPage" v-model:changePage="page"/>
      </div>
    </main>
</template>