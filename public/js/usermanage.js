$(function() {
    var $registerForm = $("#User_manage");

    $registerForm.validate({
        rules: {
            name: {
                required: true,
                lattersonly: true
            },
            username: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            mono: {
                required: true,
                numericonly: true,
                minlength: 10,
                maxlength: 12
            },
            emp_id: {
                required: true,
                numericonly: true,
            },
            password: {
                required: true,
                all: true,
                minlength: 8,
            },
            image: {
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
            name: {
                required: 'Name must be required',
                lattersonly: 'invalid Name Please Enter Only Letters'
            },
            username: {
                required: 'User Name must be required',
                lattersonly: 'invalid User Name'
            },
            email: {
                required: 'Email must be required',
                email: 'Email invalid'
            },
            mono: {
                required: 'Mobile No must be required',
                numericonly: 'Mobile No Invalid Please Numeric Value Enter',
                minlength: 'min 10 digit',
                maxlength: 'mx 12 digit'
            },
            emp_id: {
                required: 'Employee ID must be required',
                numericonly: 'Employe Id Invalid Please Numeric Value Enter'
            },
            password: {
                required: 'Password must be required',
                all: 'space is not allowed',
                minlength: 'min 8 Character',
            },
            image:{
                required: 'Image must be required',
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

