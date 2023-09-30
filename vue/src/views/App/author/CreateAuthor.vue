<template>
  <div>
    <BasicRegister />
    <div class="container-fluid">
      <div class="row">
        <Sidebar />
        <main class="col-9 ms-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <body class="bg-body-tertiary">
              <div class="container">
                <main>
                  <div class="py-5 text-center">
                    <h2>{{ titule }}</h2>
                  </div>
                  <div class="row g-5 px-5 mx-3 py-5">
                    <div class="col-md-7 col-lg-12">
                      <h5 class="mb-3">Informações revelantes sobre o autor</h5>
                      <!-- @if (isset($authors->id)) -->
                      <form
                        class="row g-3 needs-validation my-3"
                        method="post"
                        id="authorForm"
                        novalidate=""
                        action="{{ route('author.update', $authors->id) }}"
                      >
                        <!-- @else -->
                        <form
                          class="row g-3 needs-validation my-3"
                          method="post"
                          id="authorForm"
                          novalidate=""
                          action="{{ route('author.store') }}"
                        >
                          <!-- @endif -->
                          <div class="col-md-4">
                            <label for="validationCustom01" class="form-label"
                              >Nome do autor</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="validationCustom01"
                              value="{{ old('name', $authors->name) }}"
                              name="name"
                              placeholder="Digite seu nome"
                              required=""
                            />
                            <div class="valid-feedback">Nome preenchido!</div>
                            <div class="invalid-feedback">
                              É necessario inserir um nome.
                            </div>
                          </div>
                          <!-- @if (isset($authors->id)) -->
                          <div class="col-12">
                            <button type="submit" class="btn btn-success mt-5">
                              Atualizar
                            </button>
                          </div>
                          <!-- @else -->
                          <div class="col-12">
                            <button class="btn btn-primary mt-5" type="submit">
                              Enviar
                            </button>
                          </div>
                          <!-- @endif -->
                        </form>
                      </form>
                    </div>
                  </div>
                </main>
              </div>
            </body>
          </div>
        </main>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Sidebar from "@/components/app/_partials/SidebarRegister.vue";
import Footer from "@/components/app/_partials/FooterApp.vue";
import BasicRegister from "@/components/app/BasicRegister.vue";
export default {
  data() {
    return { titule: "Cadastro de autores" };
  },
  setup() {},
  components: {
    BasicRegister,
    Sidebar,
    Footer,
  },
};

const authorForm = document.getElementById("authorForm");

authorForm.addEventListener("submit", function (event) {
  if (!authorForm.checkValidity()) {
    event.preventDefault();
    event.stopPropagation();
  } else {
    console.log("Formulário enviado!");
  }

  authorForm.classList.add("was-validated");
});
</script>
