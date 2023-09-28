<template>
  <!DOCTYPE html>
  <html lang="en" class="h-100">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta
        name="description"
        content="Um projeto voltado ao sistema de gestão para biblioteca"
      />
      <meta name="Ricardo" content="Sistema de biblioteca" />
      <meta name="generator" content="Ricardo" />
      <title>Menu - Biblioteca Pedbot</title>
      <link rel="shortcut icon" :href="logoLibraryBg" />

      <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      />
    </head>

    <body
      class="d-flex h-100 text-center"
      style="
        background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=928&q=80');
      "
    >
      <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
          <div class="d-flex justify-content-between align-items-center">
            <img
              class="bg-light mx-4"
              src="@/assets/img/logoLibrary.png"
              width="150"
              alt=""
            />
            <nav class="nav nav-masthead py-4 px-3">
              <div
                class="btn-group-vertical"
                role="group"
                aria-label="Vertical button group"
              >
                <div class="pl-3 mb-5">
                  <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
                <div class="btn-group dropstart" role="group">
                  <button
                    type="button"
                    class="btn btn-primary dropdown-toggle rounded"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Listagem
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="/author">Autores</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="/book">Livros</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="/customer">Usuarios</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="/employee"
                        >Funcionarios</a
                      >
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="/rental">Alugueis</a>
                    </li>
                  </ul>
                </div>
                <div class="btn-group dropend" role="group">
                  <button
                    type="button"
                    class="btn btn-primary dropdown-toggle rounded my-1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Cadastro
                  </button>
                  <ul class="dropdown-menu p-0">
                    <li>
                      <span class="text-center dropdown-item active py-3"
                        >Registre</span
                      >
                    </li>
                    <li>
                      <a class="dropdown-item my-2" href="/createAuthor"
                        >Autor</a
                      >
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="/createBook">Livro</a>
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item" href="/createCustomer"
                        >Usuario</a
                      >
                    </li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li>
                      <a class="dropdown-item my-2" href="/createEmployee"
                        >Funcionario</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
          <!-- {{ sucess}} -->
        </header>

        <main class="px-5 mb-5">
          <div class="container w-50">
            <h2
              class="d-inline-flex shadow-lg bg-dark p-3 mx-5 text-white rounded"
            >
              Sistema de biblioteca Pedbot
            </h2>
          </div>
          <div class="container w-50">
            <p
              class="d-inline-flex lead shadow-lg p-2 mx-3 bg-dark text-white rounded"
            >
              Um espaço exclusivo para os amantes dos livros de fantasia
            </p>
          </div>
          <!-- seta -->
          <svg
            class="bg-transparent text-light bi bi-arrow-down-square-fill"
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="40"
            fill="currentColor"
            viewBox="0 5 20 10"
          >
            <path
              d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z"
            />
          </svg>
          <p class="lead">
            <a href="/" class="btn btn-md btn-light" tabindex="-1"
              >Ver contéudo</a
            >
          </p>
        </main>

        <footer class="mt-auto text-light py-2">
          <div class="container">
            <p class="mb-1">© 2023 Biblioteca Pedbot</p>
          </div>
        </footer>
      </div>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
    </body>
  </html>
</template>

<script>
import logoLibrary from "../../../public/img/logoLibrary.png";
import logoLibraryBg from "../../../public/img/logoLibraryBg.jpg";

export default {
  name: "MenuSite",
  data() {
    return {
      logoLibrary,
      logoLibraryBg,
    };
  },
};

</script>