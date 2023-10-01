<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <div class="container-fluid">
        <router-link class="navbar-brand" :to="'/menu'">Biblioteca Pedbot</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <router-link class="nav-link" :to="'/home'">Autores</router-link>
            </li>
          </ul>
          <ul class="navbar-nav mb-2 mx-4 mb-md-0">
            <li class="nav-item">
              <router-link class="nav-link btn btn-info text-light" :to="'/menu'">Menu</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  /**
   * This is the options object for the Vue component.
   */
};
</script>