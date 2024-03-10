$(function() {
    var $registerForm = $("#Setting");

    $registerForm.validate({
        rules: {
            site_title: {
                required: true,
                lattersonly: true
            },
            footer_text: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            mobile_no: {
                required: true,
                numericonly: true,
                minlength: 10,
                maxlength: 12
            },
            address: {
                required: true,
            },
            site_logo: {
              //required: true,
              extension: "jpg,jpeg,png",
              filesize: 10,
            },
            fav_icon: {
                //required: true,
                extension: "jpg,jpeg,png",
                filesize: 10,
              }
            /*cpassword: {
                required: true,
                equalTo: '#password'
            }*/

        },
        messages: {
            site_title: {
                required: 'Site Title must be required',
                lattersonly: 'invalid Name Please Enter Only Letters'
            },
            footer_text: {
                required: 'Footer Text must be required',
            },
            email: {
                required: 'Email must be required',
                email: 'Email invalid'
            },
            mobile_no: {
                required: 'Mobile No must be required',
                numericonly: 'Mobile No Invalid Please Numeric Value Enter',
                minlength: 'min 10 digit',
                maxlength: 'mx 12 digit'
            },
            address: {
                required: 'Address must be required',
            },
            site_logo:{
                //required: 'Site Logo must be required',
                extension: 'please valid extension use jpg,jpeg,png',
                filesize: 'size must be less than 50',
            },
            fav_icon:{
               //required: 'Fav Logo must be required',
                extension: 'please valid extension use jpg,jpeg,png',
                filesize: 'size must be less than 50',
            },

        },
        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents(".gen"));
            } else {
                error.insertAfter(element);
            }
        }
    })

    jQuery.validator.addMethod('lattersonly', function(value, element) {
        return /^[^-\s][a-zA-Z_\s-]+$/.test(value);
    });

    jQuery.validator.addMethod('numericonly', function(value, element) {
        return /^[0-9]+$/.test(value);
    });

    jQuery.validator.addMethod('all', function(value, element) {
        return /^[^-\s][a-zA-Z0-9_\s-]+$/.test(value);
    });
})

