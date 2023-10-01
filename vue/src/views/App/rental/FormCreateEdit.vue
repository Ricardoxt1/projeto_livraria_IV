<template>
  <form
    class="needs-validatio"
    method="post"
    id="rentalForm"
    novalidate=""
    action=""
    @submit.prevent="submitForm()"
  >
    <div class="row g-3">
      <div class="col-sm-4">
        <label for="validationCustom01">Selecionar o consumidor</label>
        <select
          class="form-select"
          id="validationCustom01"
          name="customer_id"
          aria-label="validationServer01Feedback"
          required
        >
          <option selected="" disabled="">Escolha...</option>
          <option value="{{ $customer->id }}">customer_name</option>
        </select>
        <div class="valid-feedback">Consumidor(a) selecionado(a)!</div>
        <div class="invalid-feedback">Necessário selecionar um consumidor.</div>
      </div>
      <div class="col-sm-4">
        <label for="validationCustom02">Selecionar o livro</label>
        <select
          class="form-select"
          id="validationCustom02"
          name="book_id"
          aria-label="validationServer02Feedback"
          required=""
        >
          <option selected="" disabled="" value="">Escolha...</option>
          <option value="{{ $book->id }}">book_titule</option>
        </select>
        <div class="valid-feedback">Livro selecionado!</div>
        <div class="invalid-feedback">Necessário selecionar um livro.</div>
      </div>
      <div class="col-sm-4">
        <label for="validationCustom03">Selecionar o vendedor</label>
        <select
          class="form-select"
          id="validationCustom03"
          name="employee_id"
          aria-label="validationServer03Feedback"
          required
        >
          <option selected="" disabled="" value="">Escolha...</option>
          <option value="{{ $employee->id }}">employee_name</option>
        </select>
        <div class="valid-feedback">Vendedor(a) selecionado(a)!</div>
        <div class="invalid-feedback">Necessário selecionar um vendedor.</div>
      </div>
      <div class="col-sm-3 my-4">
        <label for="validationCustom04" class="form-label"
          >Data do aluguel</label
        >
        <input
          type="date"
          class="form-control"
          value="{{ $rentals->rental_date }}"
          name="rental"
          id="validationCustom04"
          placeholder="0000-00-00"
          required
        />
        <div class="invalid-feedback">
          É necessario digitar a data do aluguel.
        </div>
      </div>
      <div class="col-sm-3 my-4">
        <label for="validationCustom05" class="form-label"
          >Data previsão de devolução</label
        >
        <input
          type="date"
          class="form-control"
          value="{{ $rentals->delivery_date }}"
          name="delivery"
          id="validationCustom05"
          placeholder="0000-00-00"
          required
        />
        <div class="invalid-feedback">
          É necessario digitar a data da previsão de devolução.
        </div>
      </div>
    </div>
    <button class="w-20 my-4 btn btn-primary btn-ls" type="submit">
      Adicionar
    </button>
  </form>
</template>

<script>
export default {
  name: "FormCreateEdit",
  setup() {},
  methods: {
    /**
     * Submits the rental form and performs validation.
     */
    submitForm() {
      const form = document.getElementById("rentalForm");

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