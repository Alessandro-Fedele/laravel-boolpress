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
            <p>Categoria: {{ post.category.name }}</p>
            <p>
              Tag:
              <span
                v-for="tag in post.tags"
                :key="tag.id"
                class="badge bg-primary text-white w-25 mr-2"
                >{{ tag.name }}</span
              >
            </p>
            <div>
              <small>
                {{ post.created_at }} Written by {{ post.user.name }}
              </small>
            </div>
          </div>
        </div>
      </div>
      <!-- PAGINATION -->
      <div class="row">
        <div class="col justify-content-center d-flex">
          <nav>
            <ul class="pagination">
              <li>
                <button class="page-link" @click="postData(currentPage - 1)">
                  Indietro
                </button>
              </li>

              <li
                v-for="page of lastPage"
                :key="page"
                class="page-item"
                :class="{ active: currentPage === page }"
              >
                <button class="page-link" @click="postData(page)">
                  {{ page }}
                </button>
              </li>

              <li>
                <button class="page-link" @click="postData(currentPage + 1)">
                  Avanti
                </button>
              </li>
            </ul>
          </nav>
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
      currentPage: 1,
      lastPage: null,
    };
  },
  methods: {
    postData(page = 1) {
      window.axios.get("/api/posts?page=" + page).then((resp) => {
        this.postsList = resp.data.data;
        this.currentPage = resp.data.current_page;
        this.lastPage = resp.data.last_page;
      });
    },
  },
  mounted() {
    // window.axios.get("/api/posts").then((resp) => {
    //   this.postsList = resp.data.data;
    //   this.currentPage = resp.data.current_page;
    //   this.lastPage = resp.data.last_page;
    // });
    this.postData();
  },
  computed: {
    formatDate() {
      // return window.dayjs(this.post.created_at).format("DD/MM/YYYY HH:mm");
    },
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