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
        path: '/post/create',
        component: CreateComponent
    },
    {
        name: 'posts',
        path: '/post/index',
        component: IndexComponent
    },
    {
        name: 'edit',
        path: '/post/edit/:id',
        component: EditComponent
    },
];
window.Vue = require('vue');
import { createWebHistory, createRouter } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes,
});
import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
import AppAdmin from './AppAdmin.vue';
createApp(App).use(router).use(VueAxios, axios).mount('#app');
createApp(AppAdmin).use(router).use(VueAxios, axios).mount('#admin');
