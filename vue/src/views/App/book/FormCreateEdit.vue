<template>
  <form
    class="needs-validation"
    id="bookForm"
    method="post"
    action=""
    novalidate=""
    @submit.prevent="createOrUpdateBook"
    @submit="submitForm"
  >
    <div class="row g-3">
      <div class="col-sm-6">
        <label for="validationCustom01" class="form-label">Titulo</label>
        <input
          type="text"
          class="form-control"
          name="titule"
          ref="tituleInput"
          v-model="book.titule"
          id="validationCustom01"
          placeholder="A bela e a fera"
          required
        />
        <div class="valid-feedback">Titulo preenchido!</div>
      </div>

      <div class="col-sm-3">
        <label for="validationCustom02" class="form-label"
          >Número de páginas</label
        >
        <input
          type="number"
          class="form-control"
          name="page"
          id="validationCustom02"
          ref="pageInput"
          v-model="book.page"
          placeholder="123"
          required
        />
        <div class="valid-feedback">Número de páginas preenchido!</div>
      </div>
      <div class="col-sm-3">
        <label for="validationCustom03" class="form-label"
          >Data de lançamento</label
        >
        <input
          type="number"
          min="1900"
          id="validationCustom03"
          ref="realese_dateInput"
          v-model="book.realese_date"
          name="realese_date"
          max=""
          step="1"
          class="form-control"
          placeholder="1800"
          required
        />
        <div class="valid-feedback">Data de lançamento preenchido!</div>
      </div>

      <div class="col-sm-4 mt-2">
        <label for="validationServer04" class="form-label"
          >Selecionar o autor</label
        >
        <select
          v-for="author in authors"
          :key="author.id"
          class="form-select"
          id="validationServer04"
          v-model="book.author_id"
          ref="authorInput"
          name="author_id"
          aria-describedby="validationServer04Feedback"
          required=""
        >
          <option selected="" disabled="">Escolha...</option>
          <option value="{{ author.id }}">{{ author.name }}</option>
        </select>
        <div class="valid-feedback">Autor(a) selecionado(a)!</div>
      </div>
      <div class="col-sm-4 mt-2">
        <label for="validationServer05" class="form-label"
          >Selecionar o livraria</label
        >
        <select
          v-for="library in libraries"
          :key="library.id"
          class="form-select"
          id="validationServer05"
          ref="libraryInput"
          v-model="book.library_id"
          name="library_id"
          aria-describedby="validationServer05Feedback"
          required=""
        >
          <option selected="" disabled="">Escolha...</option>
          <option value="{{ library.id }}">{{ library.name }}</option>
        </select>

        <div class="valid-feedback">Livraria selecionada</div>
      </div>
      <div class="col-sm-4 mt-2">
        <label for="validationServer06" class="form-label"
          >Selecionar a editora</label
        >
        <select
          v-for="publisher in publishers"
          :key="publisher.id"
          class="form-select"
          id="validationServer06"
          ref="publisherInput"
          v-model="book.publisher_id"
          name="publisher_id"
          aria-describedby="validationServer06Feedback"
          required=""
        >
          <option selected="" disabled="">Escolha...</option>
          <option value="{{ publisher.id }}">{{ publisher.name }}</option>
        </select>
        <div class="valid-feedback">Editor(a) selecionado(a)</div>
      </div>

      <div class="mb-3">
        <input
          type="file"
          class="form-control"
          aria-label="file example"
          name="img"
          ref="imgInput"
          accept="image/*"
          required
        />
        <div class="valid-feedback">Arquivo selecionado!</div>
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
  /**
   * Returns the initial data object for the component.
   * The data object contains two properties: warning and success.
   */
  data() {
    return {
      warning: null,
      success: null,
      id: this.$route.params.id,
      author: [],
      library: [],
      publisher: [],
      book: [],
    };
  },

  /**
   * Initializes the component when it is created.
   */
  created() {
    axios
      .get(process.env.API_URL + "author", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.authors = response.data;
        console.log(response.data);
      });

    axios
      .get(process.env.API_URL + "library", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.libraries = response.data;
        console.log(response.data);
      });

    axios
      .get(process.env.API_URL + "publisher", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.publishers = response.data;
        console.log(response.data);
      });
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
    createOrUpdateBook() {
      if (this.id) {
        this.updateBook();
      } else {
        this.createBook();
      }
    },

    /**
     * Creates a new book by making a POST request to the API.
     *
     * @param {object} book - The book object containing the following properties:
     * @return {void}
     */
    createBook() {
      const book = {
        titule: this.$refs.tituleInput.titule,
        page: this.$refs.pageInput.page,
        realese_date: this.$refs.realese_dateInput.realese_date,
        author_id: this.$refs.authorInput.author_id,
        library_id: this.$refs.libraryInput.library_id,
        publisher_id: this.$refs.publisherInput.publisher_id,
        image: this.$refs.imgInput.files[0],
      };
      axios
        .post(process.env.API_URL + "book", book, {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        })
        .then(() => {
          console.log("Livro inserido com sucesso");
          setTimeout(() => {
            location.reload();
          }, 800);
          this.success = "Livro inserido com sucesso";
        });
    },

    /**
     * Updates a book in the database.
     *
     * @param {object} book - The book to update
     * @return {void}
     */
    updateBook() {
      const book = {
        titule: this.$refs.tituleInput.titule,
        page: this.$refs.pageInput.page,
        realese_date: this.$refs.realese_dateInput.realese_date,
        author_id: this.$refs.authorInput.author_id,
        library_id: this.$refs.libraryInput.library_id,
        publisher_id: this.$refs.publisherInput.publisher_id,
        image: this.$refs.imgInput.files[0],
      };
      axios
        .put(process.env.API_URL + "book/" + this.id, book, {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        })
        .then(() => {
          console.log("Livro atualizado com sucesso");
          this.$router.push("/book");
        })
        .catch((error) => {
          console.log(error);
          this.$router.push("/book");
        });
    },

    /**
     * Submits the form and performs validation.
     */
    submitForm() {
      const form = document.getElementById("bookForm");

      if (form.checkValidity()) {
        console.log("Formulário válido! Enviando...");
      } else {
        console.log("Formulário inválido!");
      }

      form.classList.add("was-validated");
    },

    /**
     * Validates the year input field.
     */
    validatedYear() {
      const inputAno = document.getElementById("validationCustom03");
      const dataAtual = new Date();
      const anoAtual = dataAtual.getFullYear();
      inputAno.setAttribute("max", anoAtual);
    },
  },
};
</script>


