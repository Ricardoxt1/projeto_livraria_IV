<template></template>

<script>
export default {
  name: "FormCreateEdit",
  setup() {},
  methods: {
    submitForm() {
      const form = document.getElementById("rentalForm");

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