$(function() {
    var $registerForm = $("#register");

    $registerForm.validate({
        rules: {
            first_name: {
                required: true,
                lattersonly: true
            },
            last_name: {
                required: true,
                lattersonly: true
            },
            city: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phno: {
                required: true,
                numericonly: true,
                minlength: 10,
                maxlength: 12
            },
            gender: {
                required: true
            },
            hobby: {
                required: true
            },
            address: {
                required: true
            },
            course: {
                required: true
            },
            password: {
                required: true,
                all: true
            },
            image_upload: {
              required: true,
              extension: "jpg,jpeg,png",
              filesize: 10,
            }
            /*cpassword: {
                required: true,
                equalTo: '#password'
            }*/

        },
        messages: {
            first_name: {
                required: 'First Name must be required',
                lattersonly: 'invalid name'
            },
            last_name: {
                required: 'Last Name must be required',
                lattersonly: 'invalid name'
            },
            email: {
                required: 'email must be required',
                email: 'email invalid'
            },
            address: {
                required: 'Address must be required'
            },
            phno: {
                required: 'phno must be required',
                numericonly: 'Phno invalid',
                minlength: 'min 10 digit',
                maxlength: 'mx 12 digit'
            },
            gender: {
                required: 'gender must be required'
            },
            course: {
                required: 'course must be required'
            },
            password: {
                required: 'password must be required',
                all: 'space is not allowed'
            },
            cpassword: {
                required: 'confirm password must be required',
                equalTo: 'password mismatch'
            },
            image_upload:{
                required: 'image must be required',
                extension: 'please valid extension use jpg,jpeg,png',
                filesize: 'size must be less than 10',
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

