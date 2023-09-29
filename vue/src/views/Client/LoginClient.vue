<template>
  <div>
    <BasicClient />
    <div>
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-12">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img :src="require('@/assets/img/logoLibrary.png')" style="width: 185px" alt="logo" />
                    <h2 class="mt-1 mb-5 pb-1">Biblioteca Pedbot</h2>
                  </div>
                  <form class="needs-validatio was-validated" method="post">
                    <div class="form-outline my-4">
                      <label
                        class="form-label is-invalid mt-3"
                        for="form2Example11"
                        >Email</label
                      >
                      <input
                        type="email"
                        id="form2Example11"
                        value=""
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
                      <label class="form-label is-invalid" for="form2Example22"
                        >Senha</label
                      >
                      <div class="input-group">
                        <input
                          type="password"
                          id="form2Example22"
                          value=""
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
                
                <img :src="require('@/assets/img/client/imgLogin.jpg')" alt="dwad" height="900" width="1000" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <FooterClient />
  </div>
</template>

<script setup>
import FooterClient from "../../components/client/_partials/FooterClient.vue";
import BasicClient from "../../components/client/BasicClient.vue";
</script>

<script>
export default {
  name: "LoginClient",
  components: {
    FooterClient,
    BasicClient,
  },
  data: () => ({
  
  }),
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


