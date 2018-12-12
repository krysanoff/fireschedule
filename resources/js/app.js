
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

import Vue from 'vue'
import Icon from 'vue-awesome/components/Icon'

import 'vue-awesome/icons' //TODO change to specific icons to reduce bundle

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.component('app-component', require('./components/AppComponent'))
Vue.component('form-component', require('./components/FormComponent'))
Vue.component('graph-component', require('./components/GraphComponent'))
Vue.component('v-icon', Icon)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {

    },
    methods: {
        handleClick: function () {
            console.log('click')
        }
    },
});
