<template>
  <form
    class="needs-validatio"
    method="post"
    id="rentalForm"
    novalidate=""
    action=""
    @submit="submitForm"
    @submit.prevent="createOrUpdateRental"
  >
    <div class="row g-3">
      <div class="col-sm-4">
        <label for="validationCustom01">Selecionar o consumidor</label>
        <select
          v-for="customer in customers"
          :key="customer.id"
          class="form-select"
          id="validationCustom01"
          name="customer_id"
          ref="customerInput"
          v-model="customer.id"
          aria-label="validationServer01Feedback"
          required
        >
          <option selected="" disabled="">Escolha...</option>
          <option value="{{ customer.id }}">{{ customer.name }}</option>
        </select>
        <div class="valid-feedback">Consumidor(a) selecionado(a)!</div>
        <div class="invalid-feedback">Necessário selecionar um consumidor.</div>
      </div>
      <div class="col-sm-4">
        <label for="validationCustom02">Selecionar o livro</label>
        <select
          v-for="book in books"
          :key="book.id"
          class="form-select"
          id="validationCustom02"
          ref="bookInput"
          v-model="book.id"
          name="book_id"
          aria-label="validationServer02Feedback"
          required=""
        >
          <option selected="" disabled="" value="">Escolha...</option>
          <option value="{{ book.id }}">{{ book.titule }}</option>
        </select>
        <div class="valid-feedback">Livro selecionado!</div>
        <div class="invalid-feedback">Necessário selecionar um livro.</div>
      </div>
      <div class="col-sm-4">
        <label for="validationCustom03">Selecionar o vendedor</label>
        <select
          v-for="$employee in employees"
          :key="$employee.id"
          class="form-select"
          id="validationCustom03"
          ref="employeeInput"
          v-model="employee.id"
          name="employee_id"
          aria-label="validationServer03Feedback"
          required
        >
          <option selected="" disabled="" value="">Escolha...</option>
          <option value="{{ employee.id }}">{{ employee.name }}</option>
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
          name="rental"
          id="validationCustom04"
          ref="rentalInput"
          v-model="rental.rental"
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
          name="delivery"
          id="validationCustom05"
          ref="deliveryInput"
          v-model="rental.delivery"
          placeholder="0000-00-00"
          required
        />
        <div class="invalid-feedback">
          É necessario digitar a data da previsão de devolução.
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
  data(){
    return {
      warning: null,
      sucess: null,
    }
  },
  created() {
    axios
      .get("http://localhost/api/v1/customer", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.customers = response.data;
        console.log(response.data);
      });

    axios
      .get("http://localhost/api/v1/book", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.books = response.data;
        console.log(response.data);
      });

    axios
      .get("http://localhost/api/v1/employee", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.employees = response.data;
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
    createOrUpdateRental() {
      if (this.id) {
        this.updateRental();
      } else {
        this.createRental();
      }
    },

    createRental() {
      const rentalCustomer = this.rental.customer_id;
      const rentalBook = this.rental.book_id;
      const rentalEmployee = this.rental.employee_id;
      const rentalDate = this.rental.rental;
      const rentalDelivery = this.rental.delivery;

      axios
        .post(
          "http://localhost/api/v1/rental",
          {
            customer_id: rentalCustomer,
            book_id: rentalBook,
            employee_id: rentalEmployee,
            rental: rentalDate,
            delivery: rentalDelivery,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )

        .then(() => {
          console.log("Aluguel criado com sucesso!");
          setTimeout(() => {
            location.reload();
          }, 800);
          this.success = "Aluguel criado com sucesso!";
        });
    },

    updateRental() {
      const rentalCustomer = this.rental.customer_id;
      const rentalBook = this.rental.book_id;
      const rentalEmployee = this.rental.employee_id;
      const rentalDate = this.rental.rental;
      const rentalDelivery = this.rental.delivery;

      axios
        .put(
          "http://localhost/api/v1/rental/" + this.id,
          {
            customer_id: rentalCustomer,
            book_id: rentalBook,
            employee_id: rentalEmployee,
            rental: rentalDate,
            delivery: rentalDelivery,
          },
          {
            headers: {
              Authorization: "Bearer " + window.localStorage.token,
            },
          }
        )
        .then(() => {
          console.log("Aluguel atualizado com sucesso!");
          this.$router.push("/rental");
        })
        .catch((error) => {
          console.error(error);
          this.$router.push("/rental");
        });
    },

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