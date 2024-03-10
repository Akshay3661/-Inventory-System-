$(function() {
    var $registerForm = $("#Profile_Edit");

    $registerForm.validate({
        rules: {
            name: {
                required: true,
                lattersonly: true
            },
            mono: {
                required: true,
                numericonly: true,
                minlength: 10,
                maxlength: 12
            },
            image: {
              //required: true,
              extension: "jpg,jpeg,png",
              filesize: 10,
            }

        },
        messages: {
            name: {
                required: 'Name must be required',
                lattersonly: 'invalid Name Please Enter Only Letters'
            },
            mono: {
                required: 'Mobile No must be required',
                numericonly: 'Mobile No Invalid Please Numeric Value Enter',
                minlength: 'min 10 digit',
                maxlength: 'mx 12 digit'
            },
            image:{
                //required: 'Site Logo must be required',
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

