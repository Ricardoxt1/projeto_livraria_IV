<template>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Client</title>
      <link rel="shortcut icon" :href="'@assets/img/logoLibraryBg'" />
      <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      />
    </head>
    <body>
      <router-view />
    </body>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    />
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
