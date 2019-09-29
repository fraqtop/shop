<template>
  <div class="menu">
    <router-link
        v-for="manufacturer in manufacturers"
        v-bind:key="manufacturer.id"
        :to="{name: 'products', params: {id: manufacturer.id}}"
        class="mr-3"
    >
      <div class="menu-item">
        {{manufacturer.name}} from {{manufacturer.country}}
      </div>
    </router-link>
  </div>
</template>

<script>
  export default {
    name: "menu-list",
    data() {
      return {
        manufacturers: null,
        categories: null
      }
    },
    created() {
      if (!this.manufacturers) {
        this.getManufacturers()
      }
    },
    methods: {
      getManufacturers() {
        this.$http(this.$config.allManufacturers)
          .then(response => {
            this.manufacturers = response.data
          })
          .catch(error => {
            console.log(error.response)
          })
      },
    }
  }
</script>

<style scoped>
  .menu {
    height: 100%;
    width: 100%;
  }

  .menu-item {
    height: 150px;
    width: 100%;
    background: navajowhite;
    color: #0f0f0f;
  }
</style>