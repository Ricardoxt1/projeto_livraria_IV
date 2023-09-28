<template>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Client</title>
      <link rel="shortcut icon" :href="logoLibraryBg" />
      <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      />
    </head>
    <body>
      <section class="h-100 gradient-form py-2" style="background: #040657">
        <div class="container p-5 h-100">
          <router-view />
        </div>
      </section>
    </body>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
  </html>
</template>

<script>
import logoLibraryBg from "../../../public/img/logoLibraryBg.jpg";

export default {
  name: "BasicClient",
  data() {
    return {
      logoLibraryBg,
    };
  },
  components: {}
};
</script>
