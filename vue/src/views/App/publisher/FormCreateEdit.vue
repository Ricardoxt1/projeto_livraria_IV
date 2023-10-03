<template>
  <form
    class="row g-2 needs-validation my-3"
    method="post"
    id="publisherForm"
    novalidate=""
    action=""
    @submit="submitForm"
    @submit.prevent="createOrUpdatePublisher"
  >
    <div class="col-md-6">
      <label for="validationCustom01" class="form-label">Nome da editora</label>
      <input
        type="text"
        class="form-control"
        id="validationCustom01"
        ref="nameInput"
        v-model="publisher.name"
        placeholder="digite nome da editora"
        required=""
      />
      <div class="valid-feedback">Nome da editora preenchido!</div>
      <div class="invalid-feedback">
        É necessario digitar o nome da editora.
      </div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary mt-5" type="submit">
        {{ id ? "Atualizar" : "Adicionar" }}
      </button>
    </div>
    <div class="alert alert-danger" v-if="warning">{{ warning }}</div>
    <div class="alert alert-success" v-if="success">{{ success }}</div>
  </form>
</template>

<script>
import axios from "axios";

export default {
  name: "FormCreateEdit",
  data() {
    return {
      warning: null,
      sucess: null,
      publisher: [],
      id: this.$route.params.id,
    };
  },

  mounted() {
    const isLogged = localStorage.isLogged;
    if (isLogged != "true") {
      this.$router.push("/login");
    } else {
      this.fetchAuthor();
    }
  },

  methods: {
    /**
     * Determines whether to create or update the publisher.
     */
    createOrUpdatePublisher() {
      if (this.id) {
        this.updatePublisher();
      } else {
        this.createPublisher();
      }
    },
    /**
     * Creates a publisher
     */
    createPublisher() {
      axios
        .post(
          process.env.API_URL + "publisher",
          {
            name: this.$refs.nameInput.value,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Editora cadastrada com sucesso!");
          setTimeout(() => {
            location.reload();
          }, 800);
          this.success = "Editora cadastrada com sucesso!";
        });
    },

    /**
     * Update a existing publisher
     */
    updatePublisher() {
      axios
        .put(
          process.env.API_URL + "publisher/" + this.id,
          {
            name: this.$refs.nameInput.value,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Editora atualizada com sucesso!");
          this.$router.push("/publisher");
        })
        .catch((error) => {
          console.log(error);
          this.$router.push("/publisher");
        });
    },

    /**
     * Get the publisher
     */
    submitForm() {
      const form = document.getElementById("publisherForm");

      if (form.checkValidity()) {
        console.log("Formulário válido! Enviando...");
        // Aqui você pode adicionar a lógica para enviar o formulário, por exemplo, enviar para o backend
      } else {
        console.log("Formulário inválido!");
      }

      form.classList.add("was-validated");
    },
  },
};
</script>