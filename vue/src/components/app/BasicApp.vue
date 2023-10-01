<template>
  <!DOCTYPE html>
  <html lang="pt">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Listagem</title>
      <meta
        name="delinkion"
        content="Um projeto voltado ao sistema de gestão para biblioteca"
      />
      <meta name="Ricardo" content="Sistema de biblioteca" />
      <meta name="generator" content="Ricardo" />
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


<script>
import Navbar from "./_partials/NavbarApp.vue";

export default {
  name: "BasicApp",
  components: {
    Navbar,
  },
  data: () => ({}),

  setup() {},
};
</script>