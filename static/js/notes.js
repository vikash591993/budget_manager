$(document).ready(function(){
    $('#notes_form').submit(function(){
         
        var data = $('#notes_form').serialize() ;
       
        $.ajax(notes_url  , {
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
        alert("successfully added notes") ;
        
    }
    else 
    {
        alert("failed to add notes  ") ;
    }
}

function onError (data)
{
    alert("encountered error ") ; 
}