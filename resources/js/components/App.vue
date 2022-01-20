<template>
  <!-- layout delle pagine su cui andrà vue  -->
  <div class="d-flex flex-column">
    <Navbar style="background-image: url('img/home-bg.jpg')"> </Navbar>

    <!-- MAIN -->
    <div class="container mb-5">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
          <div v-for="post in postsList" :key="post.id" class="card mt-4 mb-5">
            <h2>{{ post.title }}</h2>
            <img :src="post.image" :alt="post.title" />
            <p>{{ post.body }}</p>
            <div>
              <small>
                {{ post.created_at }} Written by {{ post.user_id }}
              </small>
            </div>
          </div>
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
      postsList: [],
    };
  },
  mounted() {
    window.axios.get("/api/posts").then((resp) => {
      this.postsList = resp.data;
    });
  },
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