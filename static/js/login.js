$(document).ready(function(){
    $('#login_form').submit(function(){
        var data  = $('#login_form').serialize() ;
        console.log('login');
        $.ajax(login_submit_url , {
            data : data ,
            type : "POST" ,
            success : onSuccess ,
            error : onError 
        });
        return false ;
    });
});

function onSuccess(data)
{
    data = JSON.parse(data) ;
    if(data.success)
    {
        alert('successful login') ;
        window.location.href = home_url;
    }
    else
    {
        alert('failed to login , check mail and password') ;
    }
}

function onError (data)
{
    alert("something went wrong ") ;
}