import { createRouter, createWebHashHistory } from 'vue-router'

const router = createRouter({
  history: createWebHashHistory(),
  routes: [
    {
      path: '/',
      name: 'boss',
      component: () => import('../../components/boss.vue')
    },
    {
        path: '/2',
        name: 'boss2',
        component: () => import('../../components/boss2.vue')
    }
  ]
})

export default router