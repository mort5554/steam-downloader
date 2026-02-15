import { createWebHistory, createRouter } from 'vue-router'

import LibraryView from '@/components/LibraryView.vue'
import DownloadedView from '@/components/DownloadedView.vue'
import ComputerView from '@/components/ComputerView.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes:[
      {
        path: '/',
        redirect: { name: 'Library' },
      },
      {
        path: '/library',
        name: 'Library',
        component: LibraryView,
      },
      {
        path: '/downloaded',
        name: 'Downloaded',
        component: DownloadedView,
      },
      {
        path: '/computer',
        name: 'Computer',
        component: ComputerView,
      },
    ]
})

export default router