<template>
  <div>
    <BasicApp />
    <div class="container-fluid">
      <div class="row">
        <Sidebar />
        <main class="col-md-9 ms-sm col-lg-9 px-md-5">
          <div class="pt-3 pb-2 my-5 text-center">
            <h1 class="h2">{{ titule }}</h1>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-ls">
              <thead>
                <tr>
                  <th scope="col">Consumidor</th>
                  <th scope="col">Livro</th>
                  <th scope="col">Data do aluguel</th>
                  <th scope="col">Previsão de entrega</th>
                  <th scope="col">Funcionário responsável</th>
                  <th scope="col" class="text-success text-center">Editar</th>
                  <th scope="col" class="text-danger text-center">Deletar</th>
                </tr>
              </thead>
              <form v-show="showForm" @submit.prevent="createRental">
                <tbody>
                  <tr v-for="rental in rentals" :key="rental.id">
                    <td name="customer_name">{{ rental.customer.name }}</td>
                    <td name="book_titule">{{ rental.book.titule }}</td>
                    <td name="rental">{{ rental.rental }}</td>
                    <td name="delivery">{{ rental.delivery }}</td>
                    <td name="employee_name">{{ rental.employee.name }}</td>
                    <td class="text-center">
                      <a :to="'rentalEdit/' + rental.id"
                        ><svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="18"
                          height="18"
                          fill="currentColor"
                          class="bi bi-pencil-square"
                          viewBox="0 0 16 16"
                        >
                          <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                          />
                          <path
                            fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                          />
                        </svg>
                      </a>
                    </td>
                    <td class="text-center">
                      <form method="post" action="#">
                        <a href="#" :onclick="deleteRental(rental.id)">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            fill="currentColor"
                            class="bi bi-trash"
                            viewBox="0 0 16 16"
                          >
                            <path
                              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"
                            />
                            <path
                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"
                            />
                          </svg>
                        </a>
                      </form>
                    </td>
                  </tr>
                </tbody>
              </form>
            </table>
            <div class="alert alert-danger" v-if="warning">{{ warning }}</div>
            <div class="alert alert-success" v-if="success">{{ success }}</div>
          </div>
        </main>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Sidebar from "@/components/app/_partials/SidebarApp.vue";
import Footer from "@/components/app/_partials/FooterApp.vue";
import BasicApp from "@/components/app/BasicApp.vue";
import axios from "axios";

export default {
  name: "ListRental",
  mounted() {
    const isLogged = localStorage.isLogged;
    if (isLogged != "true") {
      this.$router.push("/login");
    } else {
      this.fetchRentals();
    }
  },
  created() {
    this.fetchRentals();
    axios
      .get(process.env.API_URL + "book", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.books = response.data;
        console.log(response.data);
      });

    axios
      .get(process.env.API_URL + "employee", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.employees = response.data;
        console.log(response.data);
      });

    axios
      .get(process.env.API_URL + "customer", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.customers = response.data;
        console.log(response.data);
      });
  },
  data() {
    return {
      warning: null,
      success: null,
      employee: [],
      customer: [],
      book: [],
      titule: "Listagem de alugueis",
    };
  },
  methods: {
    /**
     * delete a rental
     */
    deleteRental(id) {
      fetch(process.env.API_URL + "rental/" + id, {
        method: "DELETE",
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
        .then((response) => {
          if (response.ok) {
            console.log("Aluguel deletado com sucesso");
            setTimeout(() => {
              location.reload();
            }, 800);
            this.success = "Aluguel deletado com sucesso";
          } else {
            this.warning = "Erro ao excluir aluguel:" + response.status;
          }
        })
        .catch((error) => {
          console.error("Erro ao excluir aluguel:", error);
        });
    },
    /**
     * Fetches data from the API rental
     */
    fetchRentals() {
      axios
        .get(process.env.API_URL + "rental", {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        })
        .then((response) => {
          this.rentals = response.data;
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  components: {
    BasicApp,
    Sidebar,
    Footer,
  },
};
</script>