<template>
  <!DOCTYPE html>
  <html lang="pt">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Gerenciamento Pedbot</title>

      <link
        rel="shortcut icon"
        :href="require('@/assets/img/logoLibraryBg.jpg')"
      />
     
    </head>

    <Navbar />
    <body>
      <router-view />
    </body>
  </html>
</template>


<script setup>
</script>

<script>
import Navbar from "./_partials/NavbarApp.vue";

export default {
  name: "BasicRegister",
  components: {
    Navbar,
  },
  setup() {},
};
</script>