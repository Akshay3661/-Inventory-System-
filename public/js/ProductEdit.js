$(function() {
    var $registerForm = $("#Edit_Product");

    $registerForm.validate({
        rules: {
            name: {
                required: true,
                lattersonly: true
            },
            category: {
                required: true,
            },
            assign_to: {
                required: true,
            },
            condition: {
                required: true,
            },
            comment: {
                required: true,
            },
            quantity: {
                required: true,
            },
            inventory_no: {
                required: true,
            },
            brand: {
                required: true,
            },
            image: {
              //required: true,
              extension: "jpg,jpeg,png",
              filesize: 10,
            },
            status: {
                required: true,
            },
            purchase_price: {
                required: true,
                numericonly: true,
            },
            purchase_date: {
                required: true,
            },
            company: {
                required: true,
                lattersonly: true
            },
            owner_name: {
                required: true,
                lattersonly: true
            },
            phone: {
                required: true,
                numericonly: true,
                minlength: 10,
                maxlength: 12
            },
        },
        messages: {
            name: {
                required: 'Name must be required',
                lattersonly: 'invalid Name Please Enter Only Letters'
            },
            category: {
                required: 'Category must be required',
            },
            assign_to: {
                required: 'Assign To must be required',
            },
            condition: {
                required: 'Condition must be required',
            },
            comment: {
                required: 'Comment must be required',
            },
            quantity: {
                required: 'Quantity must be required',
            },
            inventory_no: {
                required: 'Inventory No must be required',
            },
            brand: {
                required: 'Brand must be required',
            },
            image:{
                //required: 'Image must be required',
                extension: 'please valid extension use jpg,jpeg,png',
                filesize: 'size must be less than 50',
            },
            status: {
                required: 'Status must be required',
            },
            purchase_price: {
                required: 'Purchase Price must be required',
                numericonly: 'purchase price invalid Please enter numeric',
            },
            purchase_date: {
                required: 'Purchase date must be required',
            },
            company: {
                required: 'Company must be required',
                lattersonly: 'invalid Company Name'
            },
            owner_name: {
                required: 'Owner Name must be required',
                lattersonly: 'invalid Owner Name'
            },
            phone: {
                required: 'phone must be required',
                numericonly: 'phone invalid Please enter numeric',
                minlength: 'min 10 digit',
                maxlength: 'mx 12 digit'
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

