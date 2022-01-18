<template>
  <!-- layout delle pagine su cui andrà vue  -->
  <div>
    <Navbar style="background-image: url('img/home-bg.jpg')"> </Navbar>

    <!-- MAIN -->
    <div class="container px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
          Ancora nessun dato disponibile
        </div>
      </div>
    </div>

    <Footer></Footer>
  </div>
</template>

<script>
import Navbar from "./partials/Navbar.vue";
import Footer from "./partials/Footer.vue";
export default {
  name: "App",
  components: { Navbar, Footer },
  data() {
    return {
      title: "Vue page",
    };
  },
};
</script>

<style lang="scss">
</style>