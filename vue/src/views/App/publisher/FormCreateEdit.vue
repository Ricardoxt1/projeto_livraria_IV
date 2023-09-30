<template>
  <form
    class="row g-2 needs-validation my-3"
    method="post"
    id="publisherForm"
    novalidate=""
    action=""
    @submit.prevent="submitForm()"
  >
    <div class="col-md-6">
      <label for="validationCustom01" class="form-label">Nome da editora</label>
      <input
        type="text"
        class="form-control"
        id="validationCustom01"
        value=""
        placeholder="digite nome da editora"
        required=""
      />
      <div class="valid-feedback">Nome da editora preenchido!</div>
      <div class="invalid-feedback">
        É necessario digitar o nome da editora.
      </div>
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
  methods: {
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