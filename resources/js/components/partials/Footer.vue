<template>
  <footer class="border-top footer fixed-bottom d-flex align-items-center">
    <div class="container px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
          <div class="small text-center text-muted fst-italic">
            Copyright &copy; Laravel Blog
            {{ new Date().getFullYear() }}
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style lang="scss">
footer {
  background-color: rgba(202, 178, 135, 0.842);
  backdrop-filter: blur(6px);
}
</style>