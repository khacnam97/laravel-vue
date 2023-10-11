
//
// window.Vue = require('vue');
// import * as VueRouter from 'vue-router';
//
// window.Vue.use(VueRouter);
//
// import CompaniesIndex from './components/companies/CompaniesIndex.vue';
// import CompaniesCreate from './components/companies/CompaniesCreate.vue';
// // import CompaniesEdit from './components/companies/CompaniesEdit.vue';
//
// const routes = [
//     {
//         path: '/',
//         components: {
//             companiesIndex: CompaniesIndex
//         }
//     },
//     {path: '/admin/companies/create', component: CompaniesCreate, name: 'createCompany'},
//     // {path: '/admin/companies/edit/:id', component: CompaniesEdit, name: 'editCompany'},
// ]
//
// const router = new VueRouter({ routes })
//
// const app = new Vue({ router }).$mount('#app')


// app.js
//
// require('./bootstrap');
//
// window.Vue = require('vue');
//
// import * as VueRouter from 'vue-router';
// Vue.use(VueRouter);
//
// import VueAxios from 'vue-axios';
// import axios from 'axios';
//
// import App from './App.vue';
// Vue.use(VueAxios, axios);
//

//
// const routes = [
//     {
//         name: 'home',
//         path: '/',
//         component: HomeComponent
//     },
//     {
//         name: 'create',
//         path: '/create',
//         component: CreateComponent
//     },
//     {
//         name: 'posts',
//         path: '/posts',
//         component: IndexComponent
//     },
//     {
//         name: 'edit',
//         path: '/edit/:id',
//         component: EditComponent
//     }
// ];
//
// const router = new VueRouter({ mode: 'history', routes: routes});
// const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
require('./bootstrap');
import { createApp } from 'vue';
import HomeComponent from './components/post/HomeComponent.vue';
import CreateComponent from './components/post/CreateComponent.vue';
import IndexComponent from './components/post/IndexComponent.vue';
import EditComponent from './components/post/EditComponent.vue';
const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'posts',
        path: '/posts',
        component: IndexComponent
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent
    }
];

import App from './App.vue';
createApp(App).use(routes).mount('#app');
