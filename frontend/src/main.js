import { createApp } from 'vue'
import App from './App.vue'
import './index.css'

const saved = localStorage.getItem('theme')
if (saved === 'dark') document.documentElement.classList.add('dark')

createApp(App).mount('#app')
