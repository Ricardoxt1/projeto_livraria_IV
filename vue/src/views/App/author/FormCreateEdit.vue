<template>
  <form
    class="row g-3 needs-validation my-3"
    method="post"
    id="authorForm"
    novalidate=""
    @submit="submitForm"
    @submit.prevent="createOrUpdateAuthor"
  >
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Nome do autor</label>
      <input
        type="text"
        class="form-control"
        id="validationCustom01"
        ref="nameInput"
        v-model="author.name"
        placeholder="Digite seu nome"
        required=""
      />
      <div class="valid-feedback">Nome preenchido!</div>
      <div class="invalid-feedback">É necessário inserir um nome.</div>
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
  data(){
    return {
      warning: null,
      sucess: null,
    }
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
    createOrUpdateAuthor() {
      if (this.id) {
        this.updateAuthor();
      } else {
        this.createAuthor();
      }
    },

    createAuthor() {
      const authorName = this.author.name;
      axios
        .post(
          "http://localhost/api/v1/author",
          {
            name: authorName,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Autor inserido com sucesso");

          this.success = "Autor inserido com sucesso";
          setTimeout(() => {
            location.reload();
          }, 800);
        })
        .catch((error) => {
          this.warning = error.response.data.message;
          setTimeout(() => {
            this.warning = null;
          }, 3000);
          console.log(error);
        });
    },

    updateAuthor() {
      const authorName = this.author.name;
      axios
        .put(
          "http://localhost/api/v1/author/" + this.id,
          {
            name: authorName,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Autor atualizado com sucesso");
          this.$router.push("/author");
        })
        .catch((error) => {
          console.log(error);
          this.$router.push("/author");
        });
    },
  },

  /**
   * Submits the form and performs validation.
   */
  submitForm() {
    const form = document.getElementById("authorForm");

    if (form.checkValidity()) {
      console.log("Formulário válido! Enviando...");
    } else {
      console.log("Formulário inválido!");
    }

    form.classList.add("was-validated");
  },
};
</script>