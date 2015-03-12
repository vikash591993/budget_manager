<!DOCTYPE html>

<html>
    <head>
        <title> SETTINGS PAGE </title>
        <style>
         body
        {
        background-image : url('<?php echo base_url('../static/images/money2.jpg') ?>');
        background-repeat : no-repeat ;
        background-size : cover ;
        }
        </style> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('../static/css/home_style.css'); ?>" />
        <script  src="<?php echo base_url('../static/js/jquery.js'); ?>" ></script>
        <script>
        var check_password_url = "<?php echo base_url("settings/check_password"); ?>";
        var home_url = "<?php echo base_url('home'); ?>" ;
        </script>
        <script src="<?php echo base_url('../static/js/change_password.js'); ?>" > </script>
    </head>

    <body>
        
        <form id="change_password_form">
           <br /><br /> <br /><br />
            <h1> Change password ! </h1><hr>
            <label>
                <span id="pwd"> &nbsp;Current password :</span> 
                <input type="password" name="current" value="" size="20" required >
            </label>
            <br>
            <label>
                <span id="pwd"> &nbsp;New password :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
                <input type="password" name="new" value="" size="20" required >
            </label>
            <br> <br>
            <span>&nbsp; &nbsp;</span>
            <label id="small">
                <input type="submit" class="button" value="Save changes">
            </label>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
    </body>
</html>