<template>
  <div>
    <BasicApp />
    <div class="container-fluid">
      <div class="row">
        <Sidebar />
        <main class="col-md-9 ms-sm col-lg-8 px-md-5">
          <div class="text-center pt-3 pb-2 my-5">
            <h1 class="h2">{{ titule }}</h1>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-ls">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Endereço</th>
                  <th scope="col" class="text-success text-center">Editar</th>
                  <th scope="col" class="text-danger text-center">Deletar</th>
                </tr>
              </thead>

              <form v-show="showForm" @submit.prevent="createCustomer">
                <tbody>
                  <tr v-for="customer in customers" :key="customer.id">
                    <td name="name">{{ customer.name }}</td>
                    <td name="cpf">{{ customer.cpf }}</td>
                    <td name="email">{{ customer.email }}</td>
                    <td name="phone_number">{{ customer.phone_number }}</td>
                    <td name="address">{{ customer.address }}</td>

                    <td class="text-center">
                      <a :to="'customerEdit/' + customer.id"
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
                      <form method="post" action="">
                        <a href="#" @click="deleteCustomer(customer.id)">
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
  name: "ListCustomer",

  /**
   * Mounts the component and performs necessary actions based on the user's login status.
   * @return {void}
   */
  mounted() {
    const isLogged = localStorage.isLogged;
    if (isLogged != "true") {
      this.$router.push("/login");
    } else {
      axios.get(process.env.API_URL + "customer", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      });
    }
  },

  /**
   * Fetches customer data from the server and stores it in the component's state.
   * @return {void}
   */
  created() {
    axios
      .get(process.env.API_URL + "customer", {
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
      .then((response) => {
        this.customers = response.data;
        console.log(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  },

  /**
   * Initializes the data for the component.
   * @return {Object} - An object containing the initial data values.
   */
  data() {
    return {
      warning: null,
      success: null,
      customer: [],
      titule: "Listagem de usuários",
    };
  },
  methods: {
    /**
     * Deletes a customer from the API.
     * @param {number} id - The ID of the customer to be deleted.
     */
    deleteCustomer(id) {
      fetch(process.env.API_URL + "customer/" + id, {
        method: "DELETE",
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
        .then((response) => {
          if (response.ok) {
            console.log("Usuário deletado com sucesso");
            setTimeout(() => {
              location.reload();
            }, 800);
            this.success = "Usuário deletado com sucesso";
          } else {
            console.error("Erro ao excluir usuario:", response.status);
            this.warning = "Erro ao excluir usuario:" + response.status;
          }
        })
        .catch((error) => {
          console.error("Erro ao excluir usuario:", error);
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