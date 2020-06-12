<template>
  <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a
        class="navbar-brand"
        target="_blank"
        rel="noopener noreferrer"
        href="http://www.factoriaf5.org/"
      >
        <img src="../img/logo-ff5simplon-negativo-02-e1544704915542.png" alt="Factoría F5" style="max-height: 30px" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link to="/" class="nav-link">Inicio</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/Faq" class="nav-link">FAQ</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/Categories" class="nav-link">Foro</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link">Ofertas de trabajo</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link">Perfiles</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link">Empresas</router-link>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              {{ app.user ? app.user.name : 'Cuenta' }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <router-link v-if="!app.user" :to="{ name: 'login' }" class="dropdown-item">Iniciar sesión</router-link>
              <a v-else @click="logout" class="dropdown-item" href="javascript:;">Cerrar sesión</a>
            </div>
          </li>
          <!-- we don't need this
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
          </li>-->
        </ul>
        <!-- we don't need this
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
        -->
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "navbar",
  props: ["app"],
  methods: {
    logout()
    {
      this.app.req.post('auth/logout').then(() => {
        this.app.user = null;
        this.$router.push({
          name: 'categories',
          name: 'faq'
        });
      })
    }
  }
};
</script>

<style>
</style>