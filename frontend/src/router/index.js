import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import Products from '@/components/Products'
import Login from '@/components/Login'
import store from '../store/index'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index,
      meta: {layout: 'app-layout'}
    },
    {
      path: '/products/:id',
      name: 'products',
      component: Products,
      props: true,
      meta: {layout: 'app-layout'}
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: {layout: 'common-layout'}
    }
  ]
});

router.beforeEach((to, from, next) => {
  if (store.getters.isLoggedIn || to.path === '/login') {
    next()
  } else {
    next('/login')
  }
});

export default router