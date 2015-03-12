<!DOCTYPE html>
<html>
    <head>
        <title> Search Page</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('../static/css/bootstrap.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('../static/css/form_style.css'); ?>" />
        <style>
            body
            {
                background-image : url('<?php echo base_url('../static/images/money2.jpg') ?>');
                background-repeat : no-repeat ;
                background-size : cover ;
            }
        </style>

    </head>
    <body>
        <h2> Your Search's result</h2><hr>
        <form id="search_delete_form" method="post">
            <table class="table table-striped table"> 
                <tr>
                    <td> <b>S.NO.</b> </td>
                    <td> <b>CATEGORY</b> </td>
                    <td> <b>DATE</b> </td>
                    <td> <b>AMOUNT</b> </td>
                    <td> <b>TRANSACTION NOTES</b></td>
                    <td> <b>DELETE</b> </td>
                    <td> <b>TRANSFER TO</b> </td>
                </tr>
                <?php
                $i = 1;
                $total=0;
                foreach ($list as $key => $row) {

                    $trans_id = $row["transaction_id"];
                    if ($row['notes'] != NULL) {
                        $notes = $row['notes'];
                    } else {
                        $notes = "No notes available";
                    }
                   
                    $total= $row['expense'] + $total;

                    echo "<tr><td>" . $i . "." . "</td><td>" . $row['name'] . "</td><td>"
                    . $row['date'] . "</td><td>" . $row['expense'] . "</td> <td>" . $notes . "</td><td>" .
                    "Delete <input type=checkbox  name=delete" . $i . " value=" . $trans_id . " />" . "Permanent <input type= checkbox name= permanent" . $i . " value=1/></td>                            <td>Hand<input type=radio name= hand" . $i . " value=1 />" . "Bank<input type=radio name= hand" . $i . " value=0 /> </td> </tr> ";
                    $i++;
                }
               
                echo "<input type=hidden name=count value=" . --$i . " />";
                
                ?>

            </table>
            <h3>Total expense= <?php echo "$total"; ?> </h3>
            &nbsp;<input type="submit" value="Continue">
            
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
        <script>
            var search_delete_url = "<?php echo base_url("search/delete"); ?>";
            var search_url = "<?php echo base_url('search'); ?>";
        </script>
        <script src="<?php echo base_url('../static/js/jquery.js'); ?>" ></script>
        <script src="<?php echo base_url('../static/js/search.js'); ?>" ></script>
    </body>
</html>



