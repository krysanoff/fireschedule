import '../bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'croppie'
import 'croppie/croppie.css'

$(document).ready(function () {
    let $uploadCrop = $('#upload').croppie({
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


    $('#uploadImage').on('change', function () {
        let reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });


    /*
    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $.ajax({
                url: "/image-crop",
                type: "POST",
                data: {"image":resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    $("#upload-demo-i").html(html);
                }
            });
        });
    });*/

})
