<template>
  <div>
    <BasicClient />
    <section class="h-100 gradient-form" style="background: #040657">
      <div class="container p-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-12">
                  <div class="card-body p-md-5 mx-md-4">
                    <div class="mb-4">
                      <div
                        class="d-flex align-items-center justify-content-center"
                      >
                        <div>
                          <div class="d-flex justify-content-center">
                            <img
                              :src="require('@/assets/img/logoLibrary.png')"
                              style="width: 200px"
                              alt="logo"
                            />
                          </div>
                          <h2 class="px-5" style="color: #040657">
                            Registra-se
                          </h2>
                        </div>
                        <div class="text-center px-5">
                          <img
                            :src="require('@/assets/img/client/register.svg')"
                            style="width: 320px"
                            alt="logo"
                          />
                        </div>
                      </div>
                    </div>

                    <form
                      class="row needs-validation d-flex justify-content-center"
                      id="registerForm"
                      @submit.prevent="submitForm"
                    >
                      <div class="form-outline col-7">
                        <label class="form-label mt-3" for="form2Example11"
                          >Nome do usuario</label
                        >
                        <input
                          type="text"
                          id="form2Example11"
                          ref="username"
                          v-model="register.username"
                          class="form-control"
                          name="username"
                          placeholder="digite nome do usuario"
                          required
                        />
                        <div class="valid-feedback">
                          Nome do usuario preenchido!
                        </div>
                        <div class="invalid-feedback">
                          Por favor, insira o nome do usuario.
                        </div>
                      </div>
                      <div class="form-outline col-7">
                        <label class="form-label mt-3" for="validationCustom01"
                          >Email</label
                        >
                        <input
                          type="email"
                          id="validationCustom01"
                          ref="email"
                          v-model="register.email"
                          class="form-control"
                          name="email"
                          placeholder="digite seu email"
                          required
                        />
                        <div class="valid-feedback">Email preenchido!</div>
                        <div class="invalid-feedback">
                          Por favor, insira um email.
                        </div>
                      </div>
                      <div class="form-outline my-3 col-7">
                        <label for="validationCustom02" class="form-label"
                          >Senha</label
                        >
                        <div class="input-group">
                          <input
                            type="password"
                            class="form-control"
                            id="validationCustom02"
                            ref="password"
                            v-model="register.password"
                            name="password"
                            aria-describedby="toggleButton"
                            placeholder="Digite sua senha"
                            required
                          />
                          <button
                            class="btn btn-outline-secondary"
                            type="button"
                            id="toggleButton"
                          >
                            <img
                              :src="require('@/assets/img/client/eye.svg')"
                              alt="eye"
                              width="20"
                              class="text-light"
                            />
                          </button>
                        </div>
                        <div class="valid-feedback">Senha preenchida!</div>
                        <div class="invalid-feedback">
                          Por favor, insira a senha do usuário.
                        </div>
                      </div>

                      <div class="container text-center mt-3 col-7">
                        <button class="btn btn-primary mb-3" type="submit">
                          Cadastrar
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="alert alert-danger" v-if="warning">{{ warning }}</div>
              <div class="alert alert-success" v-if="success">
                {{ success }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <FooterClient />
  </div>
</template>
  
<script>
import BasicClient from "../../components/client/BasicClient.vue";
import FooterClient from "../../components/site/_partials/FooterSite.vue";
import axios from "axios";

export default {
  name: "RegisterClient",
  components: {
    BasicClient,
    FooterClient,
  },
  data() {
    return {
      warning: null,
      sucess: null,
      register: [],
    };
  },
  submitForm() {
    axios
      .post(
        process.env.API_URL + "register",
        {
          username: this.register.username,
          email: this.register.email,
          password: this.register.password,
        },
        {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        }
      )
      .then((response) => {
        console.log(response.data);
        this.success = "Conta criada com sucesso!";
        setTimeout(() => {
          this.$router.push("/menu");
        });
      })
      .catch(() => {
        this.warning = "Email ou nome de usuario ja existe!";
      });
  },
  /**
   * Sets up the functionality for the component.
   *
   * @return {void}
   */
  setup() {
    const toggleButton = document.getElementById("toggleButton");
    const passwordInput = document.getElementById("validationCustom02");
    const eyeIcon = toggleButton.querySelector("img");

    toggleButton.addEventListener("click", function () {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("bi-eye-slash");
        eyeIcon.classList.add("bi-eye");
      } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("bi-eye");
        eyeIcon.classList.add("bi-eye-slash");
      }
    });

    const registerForm = document.getElementById("registerForm");

    registerForm.addEventListener("submit", function (event) {
      if (!registerForm.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        console.log("Formulário enviado!");
      }

      registerForm.classList.add("was-validated");
    });
  },
};
</script>
