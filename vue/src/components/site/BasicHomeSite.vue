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
      <link rel="shortcut icon" :href="require('@/assets/img/logoLibraryBg.jpg')" />
      
    </head>

    <body>
      <router-view />

    </body>
  </html>
</template>

<script>
export default {
  name: "BasicSite",
  data() {
    return {};
  },
};
</script>