<<<<<<< HEAD
$.validator.addMethod("mobilenumber", function(mobile_number, element) {
    return this.optional(element) || mobile_number.match(/^[789][0-9]{9}$/);
}, "Please specify a valid phone number");

$(document).ready(function() {
=======
$(document).ready(function() {
    $.validator.addMethod("mobilenumber", function(mobile_number, element) {
        return this.optional(element) || mobile_number.match(/^[789][0-9]{9}$/);
    }, "Please specify a valid phone number");
>>>>>>> 6297524001869759b09dbcc9710403115feea97e
    /*$('#register_form').submit(function(){
     console.log("i m here");
     var data = $('#register_form').serialize() ;
     
     $.ajax(register_submit_url  , {
     data : data ,
     type : "POST" ,
     success : onSuccess_register ,
     error : onError 
     });
     return false ;
<<<<<<< HEAD
     });*/
=======
     }); */
>>>>>>> 6297524001869759b09dbcc9710403115feea97e
    $('#register_form').validate({
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            email: {
<<<<<<< HEAD
                required: true,
                email: true
            },
            password: {
                minlength: 6,
                required: true
            },
            name: {
                mobilenumber: true,
                minlength: 6,
                required: true
            },
            cash_in_bank: {
                number: true,
                required: true
            },
            cash_in_hand: {
=======
                // mobilenumber : true ,
                required: true ,
                email: true
            },
            password: {
                minlength: 8,
                required: true
            },
            name: {
                minlength: 5,
                required: true
            },
            cash_in_hand: {
                
                 number: true,
                required: true
            },
            cash_in_bank: {
>>>>>>> 6297524001869759b09dbcc9710403115feea97e
                number: true,
                required: true
            }
        },
        highlight: function(label) {
            $(label).closest('.control-group').addClass('error');
            $(label).closest('.control-group').removeClass('success');
        },
        success: function(label) {
            $(label).closest('.control-group').addClass('success');
            $(label).closest('.control-group').removeClass('error');
        },
        submitHandler: function() {
            var data = $('#register_form').serialize();
            var url = register_submit_url;
            //$('.loading_image').show();
            $.ajax(url, {
                data: data,
                success: onSuccess_register,
                error: onError_register,
                type: "POST"
            });
            return false;
        }
    });

});

function onSuccess_register(data)
{
    data = JSON.parse(data);
    if (data.success)
    {
        alert("successful registration ");
        window.location.href = login_url;
    }
    else
    {
        alert("registration failed ");
    }
}

function onError_register(data)
{
    alert("encountere error ");
}