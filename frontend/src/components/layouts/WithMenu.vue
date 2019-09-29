<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <aside class="col-md-2">
        <menu-list></menu-list>
      </aside>
      <div class="col-md-10">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
  import MenuList from '../embedded/menu-list'
  export default {
    name: "WithMenu",
    components: {
      'menu-list': MenuList
    }
  }
</script>

<style scoped>
  aside {
    max-height: 100vh;
    background: darkslategrey;
    overflow: scroll;
  }
</style>