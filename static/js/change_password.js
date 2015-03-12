$(document).ready(function(){
    $('#change_password_form').submit(function(){
        var data = $('#change_password_form').serialize();
       console.log('pwd change'); 
       $.ajax(check_password_url,{
            data : data ,
            type : "POST" ,
            success : onSuccess ,
            error : onError 
       });
       return false;
    });
});

function onSuccess(data)
{
    data = JSON.parse(data) ;
    if(data.success)
    {
        alert('Password successfully changed') ;
        window.location.href = home_url;
    }
    else
    {
        alert('Wrong password') ;
    }
}

function onError (data)
{
    alert("something went wrong ") ;
}