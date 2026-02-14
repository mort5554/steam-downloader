import { ref, onMounted } from 'vue';

const theme = ref('light')

export function useTheme() {
  const setTheme = (newTheme) => {
    theme.value = newTheme
    localStorage.setItem('theme', newTheme)
  }

  const toggleTheme = () => {
    document.documentElement.classList.toggle("dark")
    setTheme(theme.value === 'light' ? 'dark' : 'light')
  }

  onMounted(() => {
    const savedTheme = localStorage.getItem('theme')
    if(savedTheme) {
      theme.value = savedTheme
    }
  })

  return { theme, toggleTheme }
}