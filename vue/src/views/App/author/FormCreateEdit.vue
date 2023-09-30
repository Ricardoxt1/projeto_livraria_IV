<template>
  <form
    class="row g-3 needs-validation my-3"
    method="post"
    id="authorForm"
    novalidate=""
    @submit.prevent="submitForm"
  >
    <div class="col-md-12">
      <label for="validationCustom01" class="form-label">Nome do autor</label>
      <input
        type="text"
        class="form-control"
        id="validationCustom01"
        v-model="author.name"
        placeholder="Digite seu nome"
        required=""
      />
      <div class="valid-feedback">Nome preenchido!</div>
      <div class="invalid-feedback">É necessario inserir um nome.</div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary mt-5" type="submit">Adicionar</button>
    </div>
  </form>
</template>

<script>
export default {
  name: "FormCreateEdit",
  setup() {},

  /**
   * Returns the initial data object for the Vue component.
   */
  data() {
    return {
      author: {
        name: "",
      },
    };
  },
  methods: {
    
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
  },
};
</script>