<template>
  <div>
    <!-- MAIN -->
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-8">
          <div v-for="post in postsList" :key="post.id" class="card mt-4 mb-5">
            <router-link :to="{ name: 'posts.show', params: { id: post.id } }">
              <h2>{{ post.title }}</h2>
            </router-link>
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
        <!-- SIDEBAR -->
        <div class="col-4 d-flex flex-column text-center">
          <!-- Categories -->
          <div class="mb-3">
            <h5>Categorie:</h5>
            <ul class="linksList">
              <li v-for="category of categoriesList" :key="category.id">
                <router-link to="/">{{ category.name }}</router-link>
              </li>
            </ul>
          </div>
          <!-- Tags -->
          <div>
            <h5>Tags:</h5>
            <ul class="linksList">
              <li v-for="tag of tagsList" :key="tag.id">
                <router-link to="/">{{ tag.name }}</router-link>
              </li>
            </ul>
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      title: "Vue page",
      postsList: [],
      categoriesList: [],
      tagsList: [],
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
    getCategories() {
      window.axios.get("api/categories").then((resp) => {
        this.categoriesList = resp.data;
      });
    },
    getTags() {
      window.axios.get("api/tags").then((resp) => {
        this.tagsList = resp.data;
      });
    },
  },
  mounted() {
    this.postData();
    this.getCategories();
    this.getTags();
  },
};
</script>
<style lang="scss">
.linksList {
  padding: 0;
  li {
    list-style: none;
    padding-bottom: 4px;
  }
}
</style>