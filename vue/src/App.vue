<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
import Home from './views/Site/Home.vue';
import Menu from './views/Site/Menu.vue';
import Login from './views/Client/LoginClient.vue';
import Register from './views/Client/RegisterClient.vue'
import ListAuthor from './views/App/author/ListAuthor.vue';
import ListBook from './views/App/book/ListBook.vue'
import ListCustomer from './views/App/customer/ListCustomer.vue'
import ListEmployee from './views/App/employee/ListEmployee.vue'
import ListPublisher from './views/App/publisher/ListPublisher.vue'
import ListRental from './views/App/rental/ListRental.vue'
import CreateAuthor from './views/App/author/CreateAuthor.vue'
import CreateBook from './views/App/book/CreateBook.vue'
import CreateCustomer from './views/App/customer/CreateCustomer.vue'
import CreateEmployee from './views/App/employee/CreateEmployee.vue'
import CreatePublisher from './views/App/publisher/CreatePublisher.vue'
import CreateRental from './views/App/rental/CreateRental.vue'

export default {
  name: 'App',
  components: {
    Home,
    Menu,
    Login,
    Register,
    ListAuthor,
    ListBook,
    ListCustomer,
    ListEmployee,
    ListPublisher,
    ListRental,
    CreateAuthor,
    CreateBook,
    CreateCustomer,
    CreateEmployee,
    CreatePublisher,
    CreateRental,
  },
};
</script>
