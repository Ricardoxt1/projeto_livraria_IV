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
          <a class="nav-link" href="/createCustomer">
            <span data-feather="registerCostumer" class="align-text-bottom"
              >Usuarios</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/createBook">
            <span data-feather="registerBook" class="align-text-bottom"
              >Livros</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/createAuthor">
            <span data-feather="registerAuthor" class="align-text-bottom"
              >Autores</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/create/Publisher">
            <span data-feather="registerPublisher" class="align-text-bottom"
              >Editoras</span
            >
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/createEmployee">
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
            <a class="nav-link" href="/createRentals">
              <span name="rentals" class="align-text-bottom">Alugar livro</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/customer">
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

