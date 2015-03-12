<!DOCTYPE html>
<html>
    <head>
        <title> Search </title>
        <style>
        body
        {
        background-image : url('<?php echo base_url('../static/images/money2.jpg') ?>');
        background-repeat : no-repeat ;
        background-size : cover ;
        }
        </style>

        <link type="text/css" rel="stylesheet" href="<?php echo base_url('../static/css/bootstrap.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('../static/css/form_style.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('../static/css/about_us.css'); ?>" />
    </head>

    <body>
        <form action= "<?php echo base_url("search/search_in_db"); ?>" method="post" class="smart-green" >
            <h1> !  Search  !
            <span>Please fill the field(s) to search.</span>
            </h1>
            <label>
                <span>By Peer :</span> 
                <input id="name "type="text" name="by_peer" placeholder="Peer's Name">
            </label>

            <label>
                <span>By Date :</span><br><br>
                <input type="date" name="by_date1"  placeholder="From (YYYY-MM-DD)">
                <input type="date" name="by_date2"  placeholder="To (YYYY-MM-DD)">
            </label>
            
            <label>
                <span>By Category :</span>
                <input id="category" type="text" name="by_category" placeholder="Category's Name">
            </label>
            
            <label>
                <span>By Expense :</span> <br>
                <input type="text" name="by_expense1" placeholder="Start Amount"> 
                <input type="text" name="by_expense2" placeholder="End Amount">
            </label>
            
            <span>&nbsp;</span>
            <label id="small">
                <input type="submit" class="button" value="Search">
            </label>
        </form>
    </body>
</html>

