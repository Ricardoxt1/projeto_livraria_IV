<template>
  <form
    class="needs-validation"
    method="post"
    id="customerForm"
    action=""
    novalidate=""
    @submit="submitForm"
    @submit.prevent="createOrUpdateCustomer"
  >
    <div class="row g-3">
      <div class="col-sm-6">
        <label for="validationCustom01" class="form-label">Nome completo</label>
        <input
          type="text"
          class="form-control"
          name="name"
          id="validationCustom01"
          ref="nameInput"
          v-model="customer.name"
          placeholder="fulano da silva "
          required=""
        />
        <div class="valid-feedback">Nome preenchido!</div>
        <div class="invalid-feedback">É necessario digitar o nome.</div>
      </div>

      <div class="col-sm-4">
        <label for="validationCustom02" class="form-label">Telefone</label>
        <input
          type="number"
          class="form-control"
          name="phone_number"
          id="validationCustom02"
          ref="phoneInput"
          v-model="customer.phone_number"
          placeholder="00 00000000"
          maxlength="11"
          required=""
        />
        <div class="valid-feedback">Telefone preenchido!</div>
        <div class="invalid-feedback">
          É necessario digitar o número de telefone.
        </div>
      </div>

      <div class="col-sm-6 mt-2">
        <label for="validationCustom03" class="form-label">Email</label>
        <input
          type="email"
          class="form-control"
          name="email"
          id="validationCustom03"
          ref="emailInput"
          v-model="customer.email"
          placeholder="you@example.com"
          required=""
        />
        <div class="valid-feedback">Email preenchido!</div>
        <div class="invalid-feedback">
          Por favor, entre com um email válido.
        </div>
      </div>

      <div class="col-sm-4 mt-2">
        <label for="validationCustom04" class="form-label">CPF</label>
        <input
          type="number"
          class="form-control"
          name="cpf"
          id="validationCustom04"
          ref="cpfInput"
          v-model="customer.cpf"
          placeholder="12345678909 (sem ponto e hífen)"
          maxlength="14"
          required=""
        />
        <div class="valid-feedback">CPF preenchido!</div>
        <div class="invalid-feedback">É necessario digitar o cpf.</div>
      </div>

      <div class="col-8 mt-2">
        <label for="validationCustom05" class="form-label">Endereço</label>
        <input
          type="text"
          class="form-control"
          name="address"
          id="validationCustom05"
          ref="addressInput"
          v-model="customer.address"
          placeholder="Main ST 1234"
          required=""
        />
        <div class="valid-feedback">Endereço preenchido!</div>
        <div class="invalid-feedback">
          Por favor, entre com endereço valido.
        </div>
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
   * Mounts the component and performs necessary actions based on the user's login status.
   */
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
     * Create or update a customer.
     */
    createOrUpdateCustomer() {
      if (this.id) {
        this.updateCustomer();
      } else {
        this.createCustomer();
      }
    },

    /**
     * Creates a book using the customer information provided.
     */
    createBook() {
      const customerName = this.customer.name;
      const customerPhone = this.customer.phone_number;
      const customerEmail = this.customer.email;
      const customerCpf = this.customer.cpf;
      const customerAddress = this.customer.address;
      const customer = {
        name: customerName,
        phone_number: customerPhone,
        email: customerEmail,
        cpf: customerCpf,
        address: customerAddress,
      };
      axios
        .post("http://localhost/api/v1/customer", customer, {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        })
        .then((response) => {
          if (response.ok) {
            console.log("Usuário adicionado com sucesso");
            setTimeout(() => {
              location.reload();
            }, 800);
            this.success = "Usuário adicionado com sucesso";
          } else {
            console.error("Erro ao adicionar usuario:", response.status);
            this.warning = "Erro ao adicionar usuario:" + response.status;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },

    /**
     * Updates the book information.
     */
    updateBook() {
      const customerName = this.customer.name;
      const customerEmail = this.customer.email;
      const customerCpf = this.customer.cpf;
      const customerAddress = this.customer.address;
      const customer = {
        name: customerName,
        email: customerEmail,
        cpf: customerCpf,
        address: customerAddress,
      };
      axios
        .put("http://localhost/api/v1/customer/" + this.id, customer, {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        })
        .then(() => {
          console.log("Usuário atualizado com sucesso");
          this.$router.push("/customer");
        })
        .catch((error) => {
          console.log(error);
          this.$router.push("/customer");
        });
    },

    /**
     * Submits the form and performs validation.
     */
    submitForm() {
      const form = document.getElementById("customerForm");

      if (form.checkValidity()) {
        console.log("Formulário válido! Enviando...");
      } else {
        console.log("Formulário inválido!");
      }
      form.classList.add("was-validated");
    },

    /**
     * Validates the CPF input field.
     */
    validatedCPF() {
      document
        .getElementById("validationCustom04")
        .addEventListener("input", function () {
          if (this.value.length > this.maxLength) {
            this.value = this.value.slice(0, this.maxLength);
          }
        });
    },

    /**
     * Validates the phone input field and restricts the input length.
     */
    validatedPhone() {
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
