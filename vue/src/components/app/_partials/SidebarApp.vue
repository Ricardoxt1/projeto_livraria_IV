<template>
  <nav
    id="sidebarMenu"
    class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
  >
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li>
          <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase"
          >
            <span>Listagem de itens</span>
          </h6>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/customer'">
            <span data-feather="listCostumers" class="align-text-bottom"
              >Usuarios</span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/book'">
            <span data-feather="listBooks" class="align-text-bottom"
              >Livros</span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/author'">
            <span data-feather="listAuthors" class="align-text-bottom"
              >Autores</span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/publisher'"> </router-link>
          <span data-feather="listPublishers" class="align-text-bottom"
            >Editoras</span
          >
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/employee'">
            <span data-feather="listEmployees" class="align-text-bottom"
              >Funcionário(a)</span
            >
          </router-link>
        </li>
      </ul>

      <h6
        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase"
      >
        <span>Opções</span>
      </h6>

      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <router-link class="nav-link" :to="'/rental'">
            <span name="rentals" class="align-text-bottom">Alugueis</span>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/createCustomer'">
            <span data-feather="file-text" class="align-text-bottom"
              >Cadastrar</span
            >
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

