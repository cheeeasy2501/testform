/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import '@mdi/font/css/materialdesignicons.css'
import vuetify from './vuetify'
import App from './App.vue'

const app = new Vue({
    vuetify,
    render: h => h(App), 
    el: '#app',
});
