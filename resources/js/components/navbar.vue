<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <router-link to="/" class="navbar-brand">Skeleton</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link to="/" class="nav-link">Home</router-link>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
            >{{ app.user ? app.user.name : 'Account'}}</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div v-if="!app.user">
                <router-link to="/login" class="dropdown-item">Login</router-link>
                <router-link to="/register" class="dropdown-item">Register</router-link>
              </div>

              <a v-else @click="logout" class="dropdown-item" href="javascript:;">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "navbar",
  props: ["app"],
  methods: {
    logout() {
        this.app.req.post('logout').then(() => {
            this.app.user = null;
            this.$router.push('/login');
        })
    }
  }
};
</script>

<style>
</style>
