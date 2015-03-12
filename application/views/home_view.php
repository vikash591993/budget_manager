<!DOCTYPE html> 
<html>
    <head>
        <title>home</title>
        <style>
            body
            {
                background-image: url('<?php echo base_url('../static/images/mc1.jpg'); ?>');
                background-repeat : no-repeat ;
                background-size : cover;
            }
        </style>


    </head>
    <body>
        <div class="row">
            <div class="col-md-1" style=" background-color: black;">
            </div>
            <div class="col-md-10">

                <?php
                if ($flag == 0) {

                    echo "<div  id='loading' class='progress' style='width:500px; height:30px;'>
                      <div class='progress-bar progress-bar-striped active' role='progressbar aria-valuemin='0' aria-valuemax='100' style='width: " . $progress_value . "%; line-height:30px; text-align: right;'>
                      " . $progress_value . "%
                      </div>    
                      </div>";
                    echo "<h3 style='color: burlywood; margin-left: 269;'>Money spent</h3>";
                } else {
                    echo "<h2>you are having negative balance</h2>";
                }
                ?>
                <br/><br />
            </div>

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="container carousel-container " width ="100%" >
                    <div id="mycarousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#mycarousel" data-slide-to="1"></li>
                            <li data-target="#mycarousel" data-slide-to="2"></li>

                        </ol>

                        <div class="carousel-inner ">
                            <div class="item active">
                                <img class ="home-carousel" align="middle"  src="<?php echo base_url('../static/images/carousel.png '); ?> " />
                                <div class="container">
                                    <div class="carousel-caption" style="bottom: 195px;">
                                        <h1  class="carousel-header" >Current Budget Status</h1>
                                        <br />
                                        <br />
                                        <h3>Cash in Hand: <?php echo "&#x20B9;&nbsp" . $cash_in_hand; ?></h3>
                                        <br /><br />
                                        <h3>Cash in Bank: <?php echo "&#x20B9;&nbsp" . $cash_in_bank; ?></h3>

                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img  class ="home-carousel" align="middle" src= "<?php echo base_url('../static/images/carousel.png'); ?> "/>
                                <div class="container">
                                    <div class="carousel-caption"  style="bottom: 50px;">
                                        <h1  class="carousel-header" >Transactions summary </h1>
                                        <br />
                                        <h3>Last One Month: <?php
                if (isset($monthly_sum)) {
                    echo "&#x20B9;&nbsp" . $monthly_sum;
                } else {
                    echo "you dont have any transactions";
                }
                ?></h3>
                                        <br />
                                        <h3>Last One Year: <?php
                                            if (isset($yearly_sum)) {
                                                echo "&#x20B9;&nbsp" . $yearly_sum;
                                            } else {
                                                echo "you dont have any transactions";
                                            }
                ?> </h3>
                                        <br />
                                        <h3>Overall transactions :  <?php
                                            if (isset($total_expense)) {
                                                echo "&#x20B9;&nbsp" . $total_expense;
                                            } else {
                                                echo "You have to spent some money for it!!!!";
                                            }
                ?> </h3>



                                    </div>
                                </div>
                            </div>



                            <div class="item">
                                <img  class ="home-carousel" align="middle"  src="<?php echo base_url('../static/images/carousel.png'); ?> " />
                                <div class="container">
                                    <div class="carousel-caption profiles-page" style="bottom: 295px;">
                                        <h1 class="carousel-header">Budget Tips </h1>
                                        <br />
                                        <div>

                                            <br />

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#mycarousel" data-slide="prev"> 
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#mycarousel" data-slide="next"> 
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <?php
                if ($flag == 0) {
                    echo "<div>
                     <div id='piechart' style='width: 430px; height: 400px; float:right;'></div>
                    
                    </div>
                    </div>";
                }
                ?>
            </div>
            <br> <br>
        </div>

        <div class="row">
            <div class="col-md-4">
                <br />
                <dl><font color="black">
                    <dt>last month transactions</dt>
                    <dd><?php
                if (isset($monthly_sum)) {
                    echo "&#x20B9;&nbsp" . $monthly_sum;
                } else {
                    echo "Notransaction";
                }
                ?></dd>
                    <dt>last year transactions</dt>
                    <dd><?php
                        if (isset($yearly_sum)) {
                            echo "&#x20B9;&nbsp" . $yearly_sum;
                        } else {
                            echo "No transaction";
                        }
                ?></dd>
                    <dt>overall transactions</dt>
                    <dd><?php
                        if (isset($total_expense)) {
                            echo "&#x20B9;&nbsp" . $total_expense;
                        } else {
                            echo "Spent some money for it!";
                        }
                ?></dd>
                    </font>
                </dl>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form id="notes_form" action="<?php echo base_url('home/notes'); ?>" method="post">
                    <textarea class="form-control" rows="6" cols="25" name="notes" style="margin-top: 19px; float: right;"><?php echo $important_notes; ?></textarea>
                    <button type="submit" class="btn btn-default" >Add Notes</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="row" id="datepicker" style="width: 300px; margin-top: 14px; margin-left: 15px;"></div>
        </div>
        <div class="row">

        </div>
        <br><br><br><br><br><br><br><br><br><br><br>
        <div style="background-image: url('<?php echo base_url('../static/images/mc1.jpg'); ?>');"></div>
        <div class="row div_style" style="padding-bottom: 10px; background-color: azure;">
            <div class="col-md-4">
                <table class="table table-striped" style="font-family: helvatica; float: left;">
                    <h2 style="font-family: Comic Sans MS; color: black">Your current status</h2>
                    <tr><th style='border: 1px solid black;'>cash in bank(Rs.)</th><th style='border: 1px solid black;'>cash in hand(Rs.)</th></tr>
                    <tr><th style='border: 1px solid black;'><?php echo $cash_in_bank; ?></th><th style='border: 1px solid black;'><?php echo $cash_in_hand; ?></th></tr>
                </table>  
                <p style="width: 300px;">*If the balance is negative then you are in debt.</p>
            </div>
            <div class="col-md-4">
                <table class="table table-striped" style="font-family: helvatica;">
                 <h2  style="font-family: Comic Sans MS; color : black">Your peers balance</h2>
                <tr><th style='border: 1px solid black;'>Name</th><th style='border: 1px solid black;'>Balance</th></tr>    
                    <?php
                    foreach ($peers_balance as $row) {
                        echo
                        "<tr><th style='border: 1px solid black;'>" . $row['name'] . "</th><th style='border: 1px solid black;'>" . $row['balance'] . "</th></tr>";
                    }
                    ?>   
                </table>
            </div>
            <div class="last-section col-md-4">
                <h2 class="last-transactions-header" style="font-family: Comic Sans MS; color : black">Your last 5 transactions</h2>
                <table class="table table-striped" style="font-family: helvatica; float: right;">
                    <tr ><th style='border: 1px solid black;'>Expense(Rs.)</th><th style='border: 1px solid black;'>Date</th><th  style='border: 1px solid black;'>Notes</th></tr>    
                    <?php
                    foreach ($expense as $row) {
                        echo
                        "<tr><th style='border: 1px solid black;'>" . $row['expense'] . "</th><th style='border: 1px solid black;'>" . $row['date'] . "</th><th style='border: 1px solid black;'>" . $row['notes'] . "</th></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="row div_style" style="padding-bottom: 30px; background-color: lightblue;">
            <div class="col-md-4">
                <h2 style="color: red;">Budget Management</h2>
                <p style="width: 300px;">Manage and spend your salary in the best way to live a joyful life and reduce your money problem. 
                </p>
            </div>
            <div class="col-md-4">
                <h2 style="color: red;">Manage your debt</h2>
                <p style="width: 300px;">Clear all your debt adn save your money.</p>

            </div>
            <div class="col-md-4">
                <h2 style="color: red;">Compare and Save</h2>
                <p style="width: 300px;">Compare your several transactions and save your money.</p>
            </div>
        </div>

        <script>
            var notes_url = "<?php echo base_url('home/notes'); ?>";
        </script>
        <script src="<?php echo base_url('../static/js/jquery.js'); ?>" ></script>
        <script src="<?php echo base_url('../static/js/notes.js'); ?> " ></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

        <script type="text/javascript" language="javascript">
             google.load("visualization", "1", {packages: ["corechart"]});
             google.setOnLoadCallback(drawChart);

             function drawChart()
             {
                 var data = google.visualization.arrayToDataTable([
                     ['Total Balance', 'Balance Left'],
                     ['cash_in_bank', <?php echo $cash_in_bank; ?>],
                     ['cash_in_hand', <?php echo $cash_in_hand; ?>]
                 ]);

                 var options = {
                     title: 'Money Status',
                     is3D: true,
                 };

                 var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                 chart.draw(data, options);
             }

             (function() {
                 var dd = $('dd');
                 dd.hide();
                 $('dt').on('mouseenter', function() {
                     $(this)
                             .next()
                             .show()
                             .siblings('dd')
                             .slideUp();

                 })
             })();
             $(function() {
                 $("#datepicker").datepicker();
             });
        </script>

    </body>
</html>