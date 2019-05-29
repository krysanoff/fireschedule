import '../bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'croppie'
import 'croppie/croppie.css'

import Vue from 'vue'

Vue.component('app-component', require('./components/AppComponent'))

const app = new Vue({
    el: '#list',
    data: {

    },
    methods: {
        handleClick: function () {
            console.log('click')
        }
    },
});

$(document).ready(function () {
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
})
