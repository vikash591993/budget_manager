$(document).ready(function(){
    $('#search_delete_form').submit(function(){
        var data = $('#search_delete_form').serialize() ; 
        $.ajax(search_delete_url , {
            data :data ,
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
        alert("deleted selected entries ") ;
         window.location.href = search_url ;
    }
    else
    {
        alert('unable to delete certain entries ') ; 
    }
}

function onError (data)
{
    alert ("error deleting selected entries") ;
}