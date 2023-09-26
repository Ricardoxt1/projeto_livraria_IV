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
          <a class="nav-link" href="/app/customer/create">
            <span data-feather="registerCostumer" class="align-text-bottom"
              >Usuarios</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/book/create">
            <span data-feather="registerBook" class="align-text-bottom"
              >Livros</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/author/create">
            <span data-feather="registerAuthor" class="align-text-bottom"
              >Autores</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/publisher/create">
            <span data-feather="registerPublisher" class="align-text-bottom"
              >Editoras</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/employee/create">
            <span data-feather="registerEmployee" class="align-text-bottom"
              >Funcionário(a)</span
            >
          </a>
        </li>

        <h6
          class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase"
        >
          <span>Opções</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="/app/rental/create">
              <span name="rentals" class="align-text-bottom">Alugar livro</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/app/customer">
              <span data-feather="list" class="align-text-bottom"
                >Listagem</span
              >
            </a>
          </li>
        </ul>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  /**
   * This is the options object for the Vue component.
   */
};
</script>