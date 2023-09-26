<template>
  <!DOCTYPE html>
  <html lang="pt">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Gerenciamento Pedbot</title>

      <link rel="shortcut icon" href="img/logoLibraryBg.jpg" />
      <link
        rel="canonical"
        href="https://getbootstrap.com/docs/5.2/examples/dashboard/"
      />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
      />
      <link
        href="https://getbootstrap.com/docs/5.2/assets/css/docs.css"
        rel="stylesheet"
      />
    </head>

    <body>
      <Navbar />
      <div class="container-fluid">
        <div class="row">
          <SidebarRegister />
        </div>
        <Footer/>
      </div>
      <script
        src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"
      ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
  </html>
</template>

<script>

import Navbar from "@/components/app/_partials/Navbar.vue";
import SidebarRegister from "@/components/app/_partials/SidebarRegister.vue";
import Footer from "@/components/app/_partials/Footer.vue";

export default {
  components: { Navbar, SidebarRegister, Footer, SidebarRegister1 },
  setup() {},
};
</script>