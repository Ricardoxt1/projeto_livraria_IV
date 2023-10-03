<template>
  <div>
    <BasicClient />
    <section class="h-100 gradient-form py-2" style="background: #040657">
      <div class="container p-3 h-100">
        <div>
          <div
            class="row d-flex justify-content-center align-items-center h-100"
          >
            <div class="col-xl-12">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
                      <div class="text-center">
                        <img
                          :src="require('@/assets/img/logoLibrary.png')"
                          style="width: 185px"
                          alt="logo"
                        />
                        <h2 class="mt-1 mb-5 pb-1">Biblioteca Pedbot</h2>
                      </div>
                      <form
                        class="needs-validatio was-validated"
                        @submit.prevent="submitForm"
                      >
                        <div class="form-outline my-4">
                          <label
                            class="form-label is-invalid mt-3"
                            for="form2Example11"
                            >Email</label
                          >
                          <input
                            type="email"
                            id="form2Example11"
                            v-model="form.email"
                            name="email"
                            class="form-control"
                            placeholder="digite nome do usuario"
                            required
                          />
                          <div class="valid-feedback">Email preenchido!</div>
                          <div class="invalid-feedback">
                            Por favor, insira seu email.
                          </div>
                        </div>

                        <div class="form-outline mb-4">
                          <label
                            class="form-label is-invalid"
                            for="form2Example22"
                            >Senha</label
                          >
                          <div class="input-group">
                            <input
                              type="password"
                              id="form2Example22"
                              v-model="form.password"
                              name="password"
                              class="form-control"
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
                            <div class="valid-feedback">Senha preenchida!</div>
                          </div>
                          <div class="invalid-feedback">
                            Por favor, insira a senha do usuario.
                          </div>

                          <div class="text-center pt-1 mb-5 pb-1">
                            <button
                              class="btn btn-primary btn-md my-3"
                              type="submit"
                            >
                              Entrar
                            </button>
                          </div>

                          <div
                            class="d-inline align-items-center justify-content-center"
                          >
                            <p class="mb-2">Ainda não é registrado?</p>

                            <a href="/register"
                              ><button
                                type="button"
                                class="btn btn-outline-success"
                              >
                                Criar conta
                              </button></a
                            >
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center">
                    <img
                      :src="require('@/assets/img/client/imgLogin.jpg')"
                      alt="dwad"
                      height="800"
                      width="800"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="alert alert-danger" v-if="warning">{{ warning }}</div>
        <div class="alert alert-success" v-if="success">{{ success }}</div>
      </div>
    </section>
    <FooterClient />
  </div>
</template>


<script>
import FooterClient from "../../components/site/_partials/FooterSite.vue";
import BasicClient from "../../components/client/BasicClient.vue";
import axios from "axios";

export default {
  name: "LoginClient",
  components: {
    FooterClient,
    BasicClient,
  },
  data() {
    return {
      warning: null,
      sucess: null,
      form: [],
    };
  },
  submitForm() {
    axios
      .post(
        process.env.API_URL + "login",
        {
          email: this.form.email,
          password: this.form.password,
        },
        {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        }
      )
      .then((response) => {
        console.log(response.data);
        this.success = "Login realizado com sucesso!";
        setTimeout(() => {
          this.$router.push("/menu");
        });
      })
      .catch(() => {
        this.warning = "Email ou senha incorretos!";
      });
  },
  /**
   * Sets up the toggle button functionality for password visibility.
   *
   * @return {void} No return value.
   */
  setup() {
    const toggleButton = document.getElementById("toggleButton");
    const passwordInput = document.getElementById("form2Example22");
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
  },
};
</script>


