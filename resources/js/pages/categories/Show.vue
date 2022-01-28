<template>
  <div class="container text-center my-5">
    <h1>{{ category.name }}</h1>
    <!-- main -->
    <div class="container my-5">
      <h2
        class="mb-4 text-center"
        v-if="!category.posts || category.posts.length === 0"
      >
        Ancora nessun post
      </h2>
      <div class="row justify-content-center">
        <div class="col">
          <div
            v-for="post in category.posts"
            :key="post.id"
            class="card mt-4 mb-5"
          >
            <router-link :to="{ name: 'posts.show', params: { id: post.id } }">
              <h2>{{ post.title }}</h2>
            </router-link>
            <img :src="post.image" :alt="post.title" />
            <p>{{ post.body }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      category: {
        type: Object,
        // di default metto il ritorno implicito di un oggetto
        default: () => ({}),
      },
    };
  },
  methods: {
    fetchPost() {
      const url = "/api/categories/" + this.$route.params.category;
      window.axios.get(url).then((resp) => {
        this.category = resp.data;
      });
    },
  },
  mounted() {
    this.fetchPost();
  },
};
</script>
<style lang="sass" scoped>
</style>