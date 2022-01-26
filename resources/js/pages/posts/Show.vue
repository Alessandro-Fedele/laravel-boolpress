<template>
  <div class="container text-center my-5">
    <img class="w-100" :src="post.image" :alt="post.title" />
    <h1>{{ post.title }}</h1>
    <p>{{ post.body }}</p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      post: {
        type: Object,
        // di default metto il ritorno implicito di un oggetto
        default: () => ({}),
      },
    };
  },
  methods: {
    fetchPost() {
      const url = "/api/posts/" + this.$route.params.id;
      window.axios.get(url).then((resp) => {
        this.post = resp.data;
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