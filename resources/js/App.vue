<template>
  <!-- layout delle pagine su cui andrà vue  -->
  <div class="d-flex flex-column">
    <Navbar style="background-image: url('img/home-bg.jpg')"> </Navbar>

    <!-- MAIN -->
    <router-view></router-view>

    <Footer></Footer>
  </div>
</template>

<script>
import Navbar from "./components/partials/Navbar.vue";
import Footer from "./components/partials/Footer.vue";
export default {
  name: "App",
  components: { Navbar, Footer },
  data() {
    return {
      title: "Vue page",
    };
  },
  methods: {},
  mounted() {},
  computed: {},
};
</script>

<style lang="scss">
body {
  min-height: 100vh;
}

footer {
  min-height: 50px;
}
</style>