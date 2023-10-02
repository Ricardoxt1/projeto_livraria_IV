<template>
  <div>
    <BasicRegister />
    <div class="container-fluid">
      <div class="row">
        <Sidebar />
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <body class="bg-body-tertiary">
              <div class="container">
                <main>
                  <div class="py-5 text-center">
                    <h2>{{ title }}</h2>
                  </div>
                  <div class="row g-5 px-5 mx-3 py-4">
                    <div class="col-md-7 col-lg-12">
                      <h5 class="mb-3">Registro dados pessoais</h5>
                      <Form />
                    </div>
                  </div>
                </main>
              </div>
            </body>
          </div>
        </main>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import BasicRegister from "@/components/app/BasicRegister.vue";
import Sidebar from "@/components/app/_partials/SidebarRegister.vue";
import Footer from "@/components/app/_partials/FooterApp.vue";
import Form from "@/views/App/customer/FormCreateEdit.vue";
export default {
  name: "FormCreateEdit",
  components: {
    BasicRegister,
    Sidebar,
    Footer,
    Form,
  },
  data: () => {
    return {
      title: "Editar usuário",
    };
  },
};
</script>