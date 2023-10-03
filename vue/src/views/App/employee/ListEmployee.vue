<template>
  <div>
    <BasicApp />
    <div class="container-fluid">
      <div class="row">
        <Sidebar />
        <main class="col-md-9 ms-sm col-lg-7 px-md-5">
          <div class="pt-3 pb-2 mb-5 text-center">
            <h1 class="h2">{{ titule }}</h1>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-ls">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">PIS</th>
                  <th scope="col">Cargo</th>
                  <th scope="col">Departamento</th>
                  <th scope="col">Livraria</th>
                  <th scope="col" class="text-success text-center">Editar</th>
                  <th scope="col" class="text-danger text-center">Deletar</th>
                </tr>
              </thead>
              <form v-show="showForm" @submit.prevent="createEmployee">
                <tbody>
                  <tr v-for="employee in employees" :key="employee.id">
                    <td name="name">{{ employee.name }}</td>
                    <td name="pis">{{ employee.pis }}</td>
                    <td name="office">{{ employee.office }}</td>
                    <td name="department">{{ employee.department }}></td>
                    <td v-for="library in employee.library" :key="library.id">
                      {{ library.name }}
                    </td>
                    <td class="text-center">
                      <a :to="'employeeEdit/' + employee.id"
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
                        <a href="#" @onclick="deleteEmployee(employee.id)">
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
  name: "ListEmployee",
  mounted() {
    // Check if user is logged in
    const isLogged = localStorage.isLogged;
    if (isLogged != "true") {
      this.$router.push("/login");
    } else {
      // Fetch employees data
      this.fetchEmployees();
    }
  },
  created() {
    // Fetch employees data
    this.fetchEmployees();
  },
  data() {
    return {
      warning: null,
      success: null,
      employees: [],
      library: [],
      titule: "Listagem de funcionários",
    };
  },
  methods: {
    /**
     * Delete an employee by ID
     * @param {number} id - The ID of the employee to delete
     */
    deleteEmployee(id) {
      fetch(API_URL + "employee/" + id, {
        method: "DELETE",
        headers: {
          Authorization: "Bearer " + window.localStorage.token,
        },
      })
        .then((response) => {
          if (response.ok) {
            console.log("Funcionário deletado com sucesso");
            setTimeout(() => {
              location.reload();
            }, 800);
            this.success = "Funcionário deletado com sucesso";
          } else {
            this.warning = "Erro ao excluir funcionário:" + response.status;
          }
        })
        .catch((error) => {
          console.error("Erro ao excluir funcionário:", error);
        });
    },

    /**
     * Fetch employees data from the API
     */
    fetchEmployees() {
      axios
        .get(API_URL + "employee", {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        })
        .then((response) => {
          this.employees = response.data;
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    /**
     * Fetch library data from the API
     */
    fetchLibrary() {
      axios
        .get(API_URL + "library", {
          headers: {
            Authorization: "Bearer " + window.localStorage.token,
          },
        })
        .then((response) => {
          this.employees = response.data;
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