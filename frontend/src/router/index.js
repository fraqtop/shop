import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import Products from '@/components/Products'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/products/:id',
      name: 'products',
      component: Products,
      props: true
    }
  ]
})
