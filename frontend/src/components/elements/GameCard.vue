<script setup>
  import { pluralize } from '@/utils/pluralize';
  import { ref } from 'vue';

  const playtime = ref(0)
  const playtimeMin = ref(0)

  const props = defineProps({
    id: { type: Number, default: null },
    name: { type: String, default: '' },
    imgIconUrl: { type: String, default: null },
    imgHeaderUrl: { type: String, default: null },
    index: { type: Number, default: 0 },
    playtimeForever: { type: Number, default: 0 },
  })

  if((Math.round((props.playtimeForever / 60) * 100) / 100) < 1){
    playtime.value = props.playtimeForever
    if(playtime.value == 0) playtime.value = ''
    else playtime.value = playtime.value + pluralize(playtime.value, ' minuta', ' minuty', ' minut')
  }
  else{
    playtime.value = Math.trunc((props.playtimeForever / 60))
    playtimeMin.value = props.playtimeForever - (playtime.value * 60)
    if(playtimeMin.value !== 0){
      playtime.value = playtime.value + pluralize(playtime.value, ' godzina', ' godziny', ' godzin') + ' ' + playtimeMin.value
      + pluralize(playtimeMin.value, ' minuta', ' minuty', ' minut')
    }
  }
</script>

<template>
  <div class="relative w-full h-24 mt-3 rounded-xl overflow-hidden shadow-lg group cursor-pointer border-3 bg-blue-300 dark:bg-blue-400 border-blue-400 dark:border-blue-700">
    <div 
      class="absolute inset-0 bg-cover bg-center scale-105 group-hover:scale-110 transition duration-500"
      :style="{ backgroundImage: `url(${imgHeaderUrl})` }"
    ></div>

    <div class="absolute inset-0 backdrop-blur-xs bg-white/30 dark:bg-black/50"></div>

    <div class="relative flex items-center h-full px-4 gap-4">
      <div class="shrink-0">
        <img 
          :src="imgIconUrl"
          alt="Game Icon"
          class="w-16 h-16 rounded-lg shadow-md border border-white/20"
        />
      </div>
      <div class="flex flex-col justify-center text-black dark:text-white">
        <div class="text-lg font-semibold drop-shadow">
          {{ name }}
        </div>
        <div class="text-sm text-black/60 dark:text-white/60">
          {{ playtime }}
        </div>
      </div>
    </div>
  </div>
</template>