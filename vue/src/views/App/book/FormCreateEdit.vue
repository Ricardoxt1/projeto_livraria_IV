<template>
  <form
    class="needs-validation"
    id="bookForm"
    method="post"
    action=""
    novalidate=""
    @submit.prevent="submitForm"
    
  >
    <div class="row g-3">
      <div class="col-sm-6">
        <label for="validationCustom01" class="form-label">Titulo</label>
        <input
          type="text"
          class="form-control"
          value=""
          name="titule"
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
          value="{{ $books->page ?? old('page') }}"
          name="page"
          id="validationCustom02"
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
          value="{{ $books->realese_date ?? old('realese_date') }}"
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
          class="form-select"
          id="validationServer04"
          name="author_id"
          aria-describedby="validationServer04Feedback"
          required=""
        >
          <option selected="" disabled="">Escolha...</option>
          @foreach ($authors as $author)
          <option value="">author_name</option>
          @endforeach
        </select>
        <div class="valid-feedback">Autor(a) selecionado(a)!</div>
      </div>
      <div class="col-sm-4 mt-2">
        <label for="validationServer05" class="form-label"
          >Selecionar o livraria</label
        >
        <select
          class="form-select"
          id="validationServer05"
          name="library_id"
          aria-describedby="validationServer05Feedback"
          required=""
        >
          <option selected="" disabled="">Escolha...</option>
          <!-- @foreach ($libraries as $library) -->
          <option value="">library_name</option>
          <!-- @endforeach -->
        </select>

        <div class="valid-feedback">Livraria selecionada</div>
      </div>
      <div class="col-sm-4 mt-2">
        <label for="validationServer06" class="form-label"
          >Selecionar a editora</label
        >
        <select
          class="form-select"
          id="validationServer06"
          name="publisher_id"
          aria-describedby="validationServer06Feedback"
          required=""
        >
          <option selected="" disabled="">Escolha...</option>
          <!-- @foreach ($publishers as $publisher) -->
          <option value="">publisher_name</option>
          <!-- @endforeach -->
        </select>
        <div class="valid-feedback">Editor(a) selecionado(a)</div>
      </div>

      <div class="mb-3">
        <input
          type="file"
          class="form-control"
          aria-label="file example"
          value="{{ $books->img ?? old('img') }}"
          name="img"
          accept="image/*"
          required
        />
        <div class="valid-feedback">Arquivo selecionado!</div>
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


