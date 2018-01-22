
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);


import ItemIndex from './components/item/ItemIndex.vue';
import ItemCreate from './components/item/ItemCreate.vue';
import CompaniesIndex from './components/companies/CompaniesIndex.vue';
import CompaniesCreate from './components/companies/CompaniesCreate.vue';
import CompaniesEdit from './components/companies/CompaniesEdit.vue';

const routes = [
    {path: '/item', component: ItemIndex, name: 'itemIndex'},
    {path: '/item/create', component: ItemCreate, name: 'itemCreate'},
    {path: '/', component: CompaniesIndex, name: 'companiesIndex'},
    {path: '/create', component: CompaniesCreate, name: 'createCompany'},
    {path: '/edit/:id', component: CompaniesEdit, name: 'editCompany'},
];

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
