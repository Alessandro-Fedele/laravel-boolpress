<template>
  <div class="container text-center my-5">
    <h1>CHI SIAMO</h1>
    <h3>blog@bool.it</h3>
    <h3>+23 4493854</h3>
    <h3>Frews Blv, 142, Toronto</h3>
    <!-- FORM CONTACT -->
    <div class="container text-center my-5">
      <h1>Contattami</h1>
      <form @submit.prevent="onSubmit" v-if="!formSubmitted">
        <div class="form-group">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" v-model="form.name" />
        </div>
        <div class="form-group">
          <label class="form-label">E-mail</label>
          <input type="text" class="form-control" v-model="form.email" />
        </div>
        <div class="form-group">
          <label class="form-label">Messaggio</label>
          <textarea
            type="text"
            class="form-control"
            v-model="form.message"
          ></textarea>
        </div>
        <button class="btn btn-success">INVIA</button>
      </form>
      <div class="alert alert-success" v-else>
        Grazie! Risponderemo presto alla sua email!
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      formSubmitted: false,
      form: {
        name: "",
        email: "",
        message: "",
      },
    };
  },
  methods: {
    onSubmit() {
      window.axios.post("/api/contacts", this.form).then((resp) => {
        this.formSubmitted = true;
      });
    },
  },
};
</script>
<style lang="sass">
</style>