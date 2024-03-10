$(function() {
    var $registerForm = $("#Edit_Employee");

    $registerForm.validate({
        rules: {
            fname: {
                required: true,
                lattersonly: true
            },
            lname: {
                required: true,
                lattersonly: true
            },
            gender: {
                required: true,
            },
            dob: {
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
            department: {
                required: true,
                lattersonly: true,
            },
            product: {
                required: true,
            },
            assigndate: {
                required: true,
            },
            quantity: {
                required: true,
            },
            condition: {
                required: true,
                lattersonly: true,
            },
            image: {
              //required: true,
              extension: "jpg,jpeg,png",
              filesize: 10,
            },
            status: {
                required: true,
            },
            /*cpassword: {
                required: true,
                equalTo: '#password'
            }*/

        },
        messages: {
            fname: {
                required: 'Name must be required',
                lattersonly: 'invalid Name Please Enter Only Letters'
            },
            lname: {
                required: 'Name must be required',
                lattersonly: 'invalid Name Please Enter Only Letters'
            },
            gender: {
                required: 'Gender must be required',
            },
            dob: {
                required: 'Date Of Birth must be required',
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
            department: {
                required: 'Department must be required',
                lattersonly: 'invalid Department Please Enter Only Letters'
            },
            product: {
                required: 'Product must be required',
            },
            assigndate: {
                required: 'Assigndate must be required',
            },
            quantity: {
                required: 'Quantity must be required',
            },
            condition: {
                required: 'Condition must be required',
                lattersonly: 'invalid Condition Please Enter Only Letters'
            },
            status: {
                required: 'Status must be required',
            },
            image:{
               // required: 'Image must be required',
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

