<template>
  <form
    class="needs-validation"
    method="post"
    id="employeeForm"
    novalidate=""
    action=""
    @submit="submitForm"
    @submit.prevent="createOrUpdateEmployee"
  >
    <div class="row g-3">
      <div class="col-sm-7">
        <label for="validationCustom01" class="form-label">Nome completo</label>
        <input
          type="text"
          class="form-control"
          name="name"
          id="validationCustom01"
          ref="nameInput"
          v-model="employee.name"
          placeholder="Nome Completo"
          required=""
        />
        <div class="valid-feedback">Nome preenchido!</div>
        <div class="invalid-feedback">
          É necessario digitar o nome do funcionário(a).
        </div>
      </div>

      <div class="col-sm-3">
        <label for="validationCustom02" class="form-label">PIS</label>
        <input
          type="number"
          class="form-control"
          maxlength="11"
          name="pis"
          id="validationCustom02"
          ref="pisInput"
          v-model="employee.pis"
          placeholder="12345678910"
          required=""
        />
        <div class="valid-feedback">PIS preenchido!</div>
        <div class="invalid-feedback">É necessario digitar o seu telefone.</div>
      </div>
      <div class="col-sm-4 mt-2">
        <label for="validationCustom03" class="form-label">Cargo</label>
        <input
          type="text"
          class="form-control"
          name="office"
          id="validationCustom03"
          ref="officeInput"
          v-model="employee.office"
          placeholder="Vendedor"
          required=""
        />
        <div class="valid-feedback">Cargo preenchido!</div>
        <div class="invalid-feedback">
          Por favor, digite o cargo do funcionário(a).
        </div>
      </div>

      <div class="col-sm-4 mt-2">
        <label for="validationCustom04" class="form-label">Departamento</label>
        <input
          type="text"
          class="form-control"
          name="departament"
          id="validationCustom04"
          ref="departamentInput"
          v-model="employee.departament"
          placeholder="Vendas"
          required=""
        />
        <div class="valid-feedback">Departamento preenchido!</div>
        <div class="invalid-feedback">
          Por favor, digite o departamento do funcionário(a).
        </div>
      </div>

      <div class="col-sm-2 mt-2">
        <label for="validationCustom05" class="form-label">Livraria</label
        ><br />
        <select
          v-for="library in libraries"
          :key="library.id"
          class="form-select"
          id="validationCustom05"
          ref="libraryInput"
          v-model="employee.library_id"
          name="library_id"
          aria-label="validationServer04Feedback"
          required=""
        >
          <option selected="" disabled="" value="">Escolha...</option>
          <option value="{{ library.id }}">{{ library.name }}</option>
        </select>
        <div class="valid-feedback">Livraria selecionada!</div>
        <div class="invalid-feedback">Necessário selecionar a livraria.</div>
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
    };
  },

  /**
   * Fetches data from the API and assigns it to the "library" variable.
   */
  created() {
    axios
      .get("http://localhost/api/v1/library", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.library = response.data;
        console.log(response.data);
      })
      .catch((error) => {
        console.log(error);
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
    /**
     * Creates or updates an employee.
     */
    createOrUpdateEmployee() {
      if (this.id) {
        this.updateEmployee();
      } else {
        this.createEmployee();
      }
    },
    /**
     * Created an employee.
     */
    createEmployee() {
      const employeeName = this.$refs.nameInput.value;
      const employeePis = this.$refs.pisInput.value;
      const employeeOffice = this.$refs.officeInput.value;
      const employeeDepartament = this.$refs.departamentInput.value;
      const employeeLibrary = this.$refs.libraryInput.value;

      axios
        .post(
          "http://localhost/api/v1/employee",
          {
            name: employeeName,
            pis: employeePis,
            office: employeeOffice,
            departament: employeeDepartament,
            library_id: employeeLibrary,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Functionário inserido com sucesso!");
          setTimeout(() => {
            location.reload();
          }, 800);
          this.success = "Funcionário inserido com sucesso";
        });
    },
    /**
     * Updates an employee.
     */
    updateEmployee() {
      const employeeName = this.$refs.nameInput.value;
      const employeePis = this.$refs.pisInput.value;
      const employeeOffice = this.$refs.officeInput.value;
      const employeeDepartament = this.$refs.departamentInput.value;
      const employeeLibrary = this.$refs.libraryInput.value;

      axios
        .put(
          "http://localhost/api/v1/employee/" + this.id,
          {
            name: employeeName,
            pis: employeePis,
            office: employeeOffice,
            departament: employeeDepartament,
            library_id: employeeLibrary,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Funcionário atualizado com sucesso!");
          this.$router.push("/employee");
        })
        .catch((error) => {
          console.log(error);
          this.$router.push("/employee");
        });
    },

    /**
     * Submits the form.
     */
    submitForm() {
      const form = document.getElementById("employeeForm");

      if (form.checkValidity()) {
        console.log("Formulário válido! Enviando...");
      } else {
        console.log("Formulário inválido!");
      }

      form.classList.add("was-validated");
    },

    /**
     * Validates the PIS input field by limiting the length of the input to the maximum allowable length.
     */
    validatedPIS() {
      document
        .getElementById("validationCustom02")
        .addEventListener("input", function () {
          if (this.value.length > this.maxLength) {
            this.value = this.value.slice(0, this.maxLength);
          }
        });
    },
  },
};
</script>

