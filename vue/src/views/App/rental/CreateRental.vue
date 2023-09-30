<template>

</template>

<script>
import BasicRegister from "@/components/app/BasicRegister.vue";
import Sidebar from "@/components/app/_partials/SidebarRegister.vue";
import Footer from "@/components/app/_partials/FooterApp.vue";
import Form from "@/views/App/rental/FormCreateEdit.vue";
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
      title: "Cadastro de alugueis",
    };
  },
};
</script>