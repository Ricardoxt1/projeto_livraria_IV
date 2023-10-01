<template>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Client</title>
      <link rel="shortcut icon" :href="require('@/assets/img/logoLibraryBg.jpg')" />
    </head>
    <body>
      <router-view />
    </body>
  </html>
</template>

<script>
export default {
  name: "BasicClient",
  data() {
    return {};
  },
  components: {},
};
</script>
