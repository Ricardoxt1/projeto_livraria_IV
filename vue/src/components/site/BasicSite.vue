<template>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="description" content="" />
      <meta
        name="ricardo"
        content="conteúdo referente ao sistema de gestão para biblioteca"
      />
      <meta name="" content="Ricardo" />
      <title>Home - Biblioteca Pedbot</title>
      <link rel="shortcut icon" :href="logoLibraryBg" />
      <link
        rel="canonical"
        href="https://getbootstrap.com/docs/5.2/examples/album-rtl/"
      />
      <link
        rel="canonical"
        href="https://getbootstrap.com/docs/5.2/examples/carousel/"
      />
      <link
        rel="canonical"
        href="https://getbootstrap.com/docs/5.2/examples/dashboard-rtl/"
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
    <Navbar />
    <body>
      <Home />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      />
    </body>
    <Footer />
  </html>
</template>

<script>
import logoLibraryBg from "../../../public/img/logoLibraryBg.jpg";
import Home from "../../views/Site/Home.vue";
import Navbar from "../components/site/_partials/Navbar.vue";
import Footer from "./_partials/FooterSite.vue";

export default {
  name: "BasicSite",
  data() {
    return {
      logoLibraryBg,
    };
  },
  components: {
    Home,
    Navbar,
    Footer,
  }
};
</script>