
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$http = window.axios

import { ServerTable, } from 'vue-tables-2';
Vue.use( ServerTable, {}, false, 'bootstrap3', 'default');


import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI)

import lang from 'element-ui/lib/locale/lang/es'
import locale from 'element-ui/lib/locale'
locale.use(lang)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

let products = Vue.component('products', require('./components/Products/Product.vue'));

const app = new Vue({
    el: '#app',
    components: {
        'products': products
    }
});
