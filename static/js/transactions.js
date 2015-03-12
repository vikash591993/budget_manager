$(document).ready(function() {

    $('#transactions_form').submit(function()
    {

        var data = $('#transactions_form').serialize();

        //var transactions_submit_url = "http://localhost/budget_manager/index.php/transactions/initial_submit";
        $.ajax(transactions_submit_url, {
            data: data,
            type: "POST",
            success: onSuccess,
            error: onError

        });
        return false;
    });

});

$(document).ready(function() {

    $('#withdrawal_form').submit(function()
    {

        var data = $('#withdrawal_form').serialize();

        //var transactions_submit_url = "http://localhost/budget_manager/index.php/transactions/withdrawal";
        $.ajax(withdrawal_url, {
            data: data,
            type: "POST",
            success: onSuccess,
            error: onError

        });
        return false;
    });

});

$(document).ready(function() {

    $('#credit_form').submit(function()
    {

        var data = $('#credit_form').serialize();

        //var transactions_submit_url = "http://localhost/budget_manager/index.php/transactions/credit";
        $.ajax(credit_url, {
            data: data,
            type: "POST",
            success: onSuccess,
            error: onError

        });
        return false;
    });

});

$(document).ready(function() {

    $('#delete_peer_form').submit(function()
    {

        var data = $('#delete_peer_form').serialize();

        //var transactions_submit_url = "http://localhost/budget_manager/index.php/deletions/delete_peer";
        $.ajax(delete_peer_url, {
            data: data,
            type: "POST",
            success: onSuccess_delete,
            error: onError

        });
        return false;
    });

});

$(document).ready(function() {

    $('#delete_category_form').submit(function()
    {

        var data = $('#delete_category_form').serialize();

        //var transactions_submit_url = "http://localhost/budget_manager/index.php/deletions/delete_category";
        $.ajax(delete_category_url, {
            data: data,
            type: "POST",
            success: onSuccess_delete,
            error: onError

        });
        return false;
    });

});



function onSuccess(data)
{
    data = JSON.parse(data);
    if (data.success)
    {
        alert('transaction successfully completed ');
        window.location.href = transactions_url;
    }
    else
    {
        alert('transaction failed ');
    }
}

function onError(data)
{
    alert('oops something went wrong .. we are working on it ');
}

function onSuccess_delete (data)
{
    data = JSON.parse(data);
    if(data.success)
    {
        alert ('successfuly deleted peer/category') ;
        window.location.href = transactions_url;
    }
    else
    {
        alert('unable to delete peer/category , ensure that you typed in the name correcctly') ;
    }
}