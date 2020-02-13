/*import 'croppie'
import 'croppie/croppie.css'*/

import './bootstrap'
import Vue from 'vue'
import VueRouter from 'vue-router'
import ContentComponent from "./admin/components/ContentComponent";
import EmployeesComponent from "./admin/components/EmployeesComponent"
import SidebarComponent from "./admin/components/SidebarComponent"

Vue.component('content-component', ContentComponent)
Vue.component('employees-component', EmployeesComponent)
Vue.component('sidebar-component', SidebarComponent)

// Add Laravel localization data to Vue
Vue.prototype.__ = string => _.get(window.i18n, string)

Vue.use(VueRouter)

const routes = [
    {path: '/employees', component: EmployeesComponent}
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('#app');

/*$(document).ready(function () {
    let $uploadImage = $('#uploadImage')
    let $fullImage = $('#fullImage').croppie({
        enableExif: true,
        viewport: {
            width: 225,
            height: 300
        },
        boundary: {
            width: 300,
            height: 400
        }
    })


    $uploadImage.on('change', function () {
        let $photo = $('#photo')
        if ($photo) {
            console.log('photo')
            $photo.css('display', 'none')
            $('#new_photo').css('display', 'flex')
        }

        let reader = new FileReader()
        reader.onload = function (e) {
            $fullImage.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete')
            })
        }
        reader.readAsDataURL(this.files[0])
    })


    $('#crop').on('click', function () {
        $fullImage.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            let html = '<img src="' + resp + '" />'
            $("#croppedImage").html(html)
            $('input[name="croppedImage"]').val(resp)
        })
    })
})*/
