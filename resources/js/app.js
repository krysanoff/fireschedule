
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap'
import Vue from 'vue'
import VueRouter from 'vue-router'

import AppComponent from "./components/AppComponent"
import HomeComponent from "./components/HomeComponent"
import ShiftComponent from "./components/ShiftComponent"
import GraphComponent from "./components/GraphComponent"
import FormComponent from "./components/FormComponent"
import { library } from '@fortawesome/fontawesome-svg-core'
import { faTimes } from '@fortawesome/free-solid-svg-icons'
import { faArrowUp } from '@fortawesome/free-solid-svg-icons'
import { faArrowDown } from '@fortawesome/free-solid-svg-icons'
import { faPlus } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import EmployeesComponent from "./admin/components/EmployeesComponent";

library.add(faTimes)
library.add(faArrowUp)
library.add(faArrowDown)
library.add(faPlus)

// Add Laravel localization data to Vue
Vue.prototype.__ = string => _.get(window.i18n, string)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.component('app-component', AppComponent)
Vue.component('form-component', FormComponent)
Vue.component('graph-component', GraphComponent)
Vue.component('home-component', HomeComponent)
Vue.component('shift-component', ShiftComponent)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(VueRouter)

const routes = [
    {path: '/', name: 'home', component: HomeComponent},
    {path: '/shift/:shift_number', name: 'shift', component: ShiftComponent},
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('#app');
