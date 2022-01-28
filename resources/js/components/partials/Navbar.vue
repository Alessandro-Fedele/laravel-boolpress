<template>
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <router-link class="navbar-brand" to="/">Laravel Blog</router-link>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto py-4 py-lg-0">
          <li class="nav-item">
            <router-link class="nav-link px-lg-3 py-3 py-lg-4" to="/"
              >Home</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link px-lg-3 py-3 py-lg-4" to="/about"
              >Chi siamo</router-link
            >
          </li>
          <li class="nav-item">
            <router-link class="nav-link px-lg-3 py-3 py-lg-4" to="/contact"
              >Contatti</router-link
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {};
</script>

<style lang="scss">
nav a {
  color: white !important;
}

li {
  .router-link-exact-active {
    color: rgb(20, 109, 20) !important;
    background-color: white;
  }
}
</style>