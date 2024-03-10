$(function() {
    var $registerForm = $("#Add_Category");

    $registerForm.validate({
        rules: {
            name: {
                required: true,
                lattersonly: true
            },
            description: {
                required: true,
                lattersonly: true
            },
            image: {
              required: true,
              extension: "jpg,jpeg,png",
              filesize: 10,
            },
            status: {
                required: true,
            }
        },
        messages: {
            name: {
                required: 'Name must be required',
                lattersonly: 'invalid Name Please Enter Only Letters'
            },
            description: {
                required: 'Description must be required',
                lattersonly: 'invalid Description Please Enter Only Letters'
            },
            image:{
                required: 'Image must be required',
                extension: 'please valid extension use jpg,jpeg,png',
                filesize: 'size must be less than 50',
            },
            status: {
                required: 'Status must be required',
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

