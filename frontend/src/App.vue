<template>
  <div id="app">
    <component v-bind:is="layout"></component>
  </div>
</template>

<script>
import SimpleLayout from './components/layouts/Common'
import WithMenuLayout from './components/layouts/WithMenu'
export default {
  name: 'App',
  components: {
    'common-layout': SimpleLayout,
    'app-layout': WithMenuLayout
  },
  computed: {
    layout() {
      return this.$route.meta.layout || 'common-layout'
    }
  },

  created() {
    this.setInterceptions()
  },
  methods: {
    setInterceptions() {
      return this.$http.interceptors.response.use(undefined, (error) => {
        if (error.response && error.response.status === 401) {
          this.$router.push('/login')
        }
      });
    }
  }
}
</script>

<style lang="scss">
#app {
  padding: 0;
  margin: 0;
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
@import '~bootstrap/scss/bootstrap';
</style>
