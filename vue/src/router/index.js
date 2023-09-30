import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Site/Home.vue'

const routes = [
    {
        path: '/',
        name: 'HomeSite',
        component: Home
    },
    {
        path: '/menu',
        name: 'Menu',

        component: () => import(/* webpackChunkName: "menu" */ '../views/Site/Menu.vue')
    },
    {
        path: '/login',
        name: 'Login',

        component: () => import(/* webpackChunkName: "login" */ '../views/Client/LoginClient.vue')
    },
    {
        path: '/register',
        name: 'Register',

        component: () => import(/* webpackChunkName: "register" */ '../views/Client/RegisterClient.vue')
    },
    {
        path: '/author',
        name: 'ListAuthor',

        component: () => import(/* webpackChunkName: "author" */ '../views/App/author/ListAuthor.vue')
    },
    {
        path: '/book',
        name: 'ListBook',

        component: () => import(/* webpackChunkName: "book" */ '../views/App/book/ListBook.vue')
    },
    {
        path: '/customer',
        name: 'ListCustomer',

        component: () => import(/* webpackChunkName: "customer" */ '../views/App/customer/ListCustomer.vue')
    },
    {
        path: '/employee',
        name: 'ListEmployee',

        component: () => import(/* webpackChunkName: "employee" */ '../views/App/employee/ListEmployee.vue')
    },
    {
        path: '/publisher',
        name: 'ListPublisher',

        component: () => import(/* webpackChunkName: "publisher" */ '../views/App/publisher/ListPublisher.vue')
    },
    {
        path: '/rental',
        name: 'ListRental',

        component: () => import(/* webpackChunkName: "rental" */ '../views/App/rental/ListRental.vue')
    },
    {
        path: '/createAuthor',
        name: 'CreateAuthor',
    
        component: () => import(/* webpackChunkName: "createAuthor" */ '../views/App/author/CreateAuthor.vue'),
    },
    {
        path: '/createBook',
        name: 'CreateBook',

        component: () => import(/* webpackChunkName: "createBook" */ '../views/App/book/CreateBook.vue')
    },
    {
        path: '/createCustomer',
        name: 'CreateCustomer',

        component: () => import(/* webpackChunkName: "createCustomer" */ '../views/App/customer/CreateCustomer.vue')
    },
    {
        path: '/createEmployee',
        name: 'CreateEmployee',

        component: () => import(/* webpackChunkName: "createEmployee" */ '../views/App/employee/CreateEmployee.vue')
    },
    {
        path: '/createPublisher',
        name: 'CreatePublisher',

        component: () => import(/* webpackChunkName: "createPublisher" */ '../views/App/publisher/CreatePublisher.vue')
    },
    {
        path: '/createRental',
        name: 'CreateRental',

        component: () => import(/* webpackChunkName: "createRental" */ '../views/App/rental/CreateRental.vue')
    }

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router