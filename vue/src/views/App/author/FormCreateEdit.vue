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
  data() {
    return {
      warning: null, // Warning message
      success: null, // Success message
      id: this.$route.params.id, // ID of the author to be updated
      author: [],
    };
  },

  mounted() {
    const isLogged = localStorage.isLogged;
    if (isLogged != "true") {
      this.$router.push("/login"); // Redirect to login page if not logged in
    } else {
      this.fetchAuthor(); // Fetch author data
    }
  },

  methods: {
    /**
     * Determines whether to create or update the author.
     */
    createOrUpdateAuthor() {
      if (this.id) {
        this.updateAuthor(); // Update author if ID exists
      } else {
        this.createAuthor(); // Create author if ID doesn't exist
      }
    },

    /**
     * Creates a new author.
     */
    createAuthor() {
      axios
        .post(
          process.env.API_URL + "author",
          {
            name: this.$refs.nameInput.name,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Autor inserido com sucesso!");
          this.success = "Autor inserido com sucesso!";
          setTimeout(() => {
            location.reload(); // Reload the page after successful insertion
          }, 800);
        })
        .catch((error) => {
          this.warning = error.response.data.message; // Set warning message
          setTimeout(() => {
            this.warning = null; // Clear warning message after 3 seconds
          }, 3000);
          console.log(error);
        });
    },

    /**
     * Updates an existing author.
     */
    updateAuthor() {
      axios
        .put(
          process.env.API_URL + "author/" + this.id,
          {
            name: this.$refs.nameInput.name,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Autor atualizado com sucesso!");
          this.$router.push("/author"); // Redirect to author page after successful update
        })
        .catch((error) => {
          console.log(error);
          this.$router.push("/author"); // Redirect to author page on error
        });
    },

    /**
     * Submits the form and performs validation.
     */
    submitForm() {
      const form = document.getElementById("authorForm");

      if (form.checkValidity()) {
        console.log("Valido formulário! Enviando...");
      } else {
        console.log("Invalid form!");
      }

      form.classList.add("was-validated"); // Add validation classes to form
    },
  },
};
</script>