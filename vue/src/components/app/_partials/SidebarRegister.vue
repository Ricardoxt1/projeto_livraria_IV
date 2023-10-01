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
            <span>Cadastro</span>
          </h6>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/createCustomer'">
            <span data-feather="registerCostumer" class="align-text-bottom"
              >Usuarios</span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/createBook'">
            <span data-feather="registerBook" class="align-text-bottom"
              >Livros</span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/createAuthor'">
            <span data-feather="registerAuthor" class="align-text-bottom"
              >Autores</span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/createPublisher'">
            <span data-feather="registerPublisher" class="align-text-bottom"
              >Editoras</span
            >
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="'/createEmployee'">
            <span data-feather="registerEmployee" class="align-text-bottom"
              >Funcionário(a)</span
            >
          </router-link>
        </li>

        <h6
          class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase"
        >
          <span>Opções</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <router-link class="nav-link" :to="'/createRental'">
              <span name="rentals" class="align-text-bottom">Alugar livro</span>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="'/customer'">
              <span data-feather="list" class="align-text-bottom"
                >Listagem</span
              >
            </router-link>
          </li>
        </ul>
      </ul>
    </div>
  </nav>
</template>

