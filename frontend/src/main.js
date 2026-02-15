import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import router from './router'

const saved = localStorage.getItem('theme')
if (saved === 'dark') document.documentElement.classList.add('dark')

createApp(App)
  .use(router)
  .mount('#app')
