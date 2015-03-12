<html>
    <head>
        <title>Transactions</title>
        <style>
            body
            {
                background-image : url('<?php echo base_url('../static/images/money2.jpg') ?>');
                background-repeat : no-repeat ;
                background-size : cover ;

            }
        </style>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('../static/css/form_style.css'); ?>" /> 


    </head>

    <body>

        <div id='trans' class="page-content inset col-md-8">
            <div  id="transactions_contents">
                <div>
                    <ul id="trans_tabs" class="nav nav-tabs" >
                        <li class="active"><a data-toggle="tab" href="#section1">Add Transaction</a></li>
                        <li><a data-toggle="tab" href="#section2" > Add Withdrawal</a></li>
                        <li><a data-toggle="tab" href="#section3" >Add credit/debit</a></li>
                        <li><a data-toggle="tab" href="#section4" >Delete</a></li>
                    </ul>
                    <div class="tab-content">

                        <div id="section1" class="tab-pane active">
                            <form id="transactions_form" class="container-fluid col-md-5 smart-green"  >

                                <h1> ! Transaction ! 
                                    <span>Please fill the expenditure/income details.</span>
                                </h1>


                                <div>
                                    <label>
                                        <span> Date : </span><br><br>
                                        <input type="date" name="date" placeholder="YYYY-MM-DD" /><br>
                                    </label>
                                </div>

                                <div>
                                    <label>
                                        <span> Amount : </span><br><br>
                                        <input type="number" step="any" name="expenditure" placeholder="total expense"  /><br>
                                    </label>


                                    <div>
                                        <label>
                                            <span> Transaction notes : </span>
                                            <input type="text" name="transaction_notes" placeholder="enter note here" /><br>
                                        </label>
                                    </div>

                                    <div>
                                        <label>
                                            <span> No. of categories :</span> <br> 
                                            <input type="number" id="num_categories" class="form-control" name="num_categories" />
                                        </label>
                                    </div>

                                    <div id="category_box">
                                        <br />
                                    </div>

                                    <div id="category_boxes_more">

                                    </div>

                                    <div>
                                        <label>
                                            <span> Is peer involved ? </span>
                                        </label>
                                        <br />
                                        <select name="peer" id="peer_or_not" class="smart-green select"  >
                                            <option value=0 > <b>No</b> </option>
                                            <option value=1 > Yes </option>
                                        </select>
                                        <br/>

                                        <div id="peer_box_here">

                                        </div>
                                        <br />

                                        <label>
                                            Transaction involved : Hand or Bank ? <br><br>
                                            <input type="radio" name="hand" value=1 checked /> Hand &nbsp; &nbsp;
                                            <input type="radio" name="hand" value=0 /> Bank<br><br>
                                        </label>

                                        <label>
                                            Money added or deducted by transaction ? <br><br>
                                            <input type="radio" name="money_deduct" value=1 checked /> Deducted &nbsp;
                                            <input type="radio" name="money_deduct" value=0 /> Gained <br><br>
                                        </label>
                                    </div>
                                    <input type='submit' class='btn btn-primary form-control' smart-green button:hover value='Submit>>' />
                                </div>
                            </form>
                        </div>


                        <div id="section2" class="tab-pane fade ">
                            <form id="withdrawal_form" class="container-fluid col-md-5 smart-green" method="post" action=<?php echo base_url("transactions/withdrawal"); ?>  >
                                <h1> !  Withdrawal / Deposit  ! 
                                    <span>Please fill the details.</span>
                                </h1>
                                <div>
                                    <label>
                                        Date :<br>
                                        <input type="date" name="withdrawal_date" placeholder=" YYYY-MM-DD" />
                                    </label>
                                    <br>
                                    <label>
                                        Amount :<br>
                                        <input type="number" step="any" name="withdrawal_amount" placeholder="Please enter the amount"/>
                                    </label>

                                    <br/>
                                    <label>
                                        Withdrawal or Deposit :<br>
                                        &nbsp; &nbsp;<input type="radio" name="withdrawal_flag" value=1 checked /> Withdrawal <br> 
                                        &nbsp; &nbsp;<input type="radio" name="withdrawal_flag" value=0 /> Deposit     <br> 
                                        <br>
                                    </label>

                                    <input type="submit" class="btn btn-primary form-control " value="Submit>>" />  
                                </div>
                            </form>
                        </div>


                        <div id="section3" class="tab-pane fade ">
                            <form id="credit_form" class="container-fluid col-md-5 smart-green" action=<?php echo base_url("transactions/credit"); ?> method="post">
                                <h1>
                                    !  Credit / Debit  !
                                </h1>
                                <div>
                                    <label>
                                        Date :<br>
                                        <input type="date" name="credit_date" placeholder="YYYY-MM-DD" /><br>
                                    </label>

                                    <label>
                                        Amount :
                                        <input type="number" step="any" name="credit_amount" placeholder="Please enter the amount" /><br>
                                    </label>&nbsp; &nbsp;

                                    <label>
                                        Peer Name :
                                        <input type="text" name="credit_name" placeholder="Please enter friend's name"/><br><br>
                                    </label>

                                    <label>
                                        Credit or Debit :<br>
                                        &nbsp; &nbsp;<input type="radio" name="credit_flag" value=1 checked /> Credit <br>
                                        &nbsp; &nbsp;<input type="radio" name="credit_flag" value=0 /> Debit <br>
                                        <br>
                                    </label>

                                    <label>
                                        Hand or Bank :<br>
                                        &nbsp; &nbsp;<input type="radio" name="hand" value=1 checked /> Hand <br>
                                        &nbsp; &nbsp;<input type="radio" name="hand" value=0 /> Bank <br>
                                        <br><br>
                                    </label>

                                    <input type="submit" class="btn btn-primary form-control" value="Submit>>" />
                                </div>
                            </form>
                        </div>


                        <div id="section4" class="tab-pane fade">
                            <div class="smart-green">

                                <form id="delete_peer_form" method="post" action="<?php echo base_url('deletions/delete_peer'); ?>">
                                    <h1>
                                        Delete a Peer / Category  !
                                    </h1>
                                    <label>
                                        Delete peer :
                                        <input type="text" name="peer_name" placeholder="enter peer name" />
                                        <br />
                                    </label>
                                    <input id="delete" type="submit" value="delete" />
                                </form>
                                <br />

                                <form id="delete_category_form" method="post" action="<?php echo base_url('deletions/delete_category'); ?>" >
                                    <label>
                                        Delete Category :
                                        <input type="text" name="category_name" placeholder="enter category name" /><br />
                                    </label>           
                                    <input id="delete" type="submit" value="delete" />
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script>

            $(function() {
                $('#num_categories').blur(function() {

                    var categories_number = $('#num_categories').val();
                    console.log(categories_number);
                    $(function() {
                        $('#category_boxes_more').empty();
                        for (var i = 0; i < categories_number; i++)
                        {
                            console.log("i was here");
                            var index = i + 1;
                            $('#category_boxes_more').append("<div><label>Category :" + index + " </label><input type='text' class='form-control' name='category" + index + "' /> </div>");

                        }
                    });

                });
            });


            $(function() {
                $('#peer_or_not').change(function() {
                    var display = $('#peer_or_not').val();
                    if (display == 0)
                    {
                        $('#peer_box_here').empty();

                    }
                    else
                    {
                        $('#peer_box_here').append("<div><label> Enter peer name : </label> <input type='text' name='peer_name' /><br/> </div>");
                    }
                });
            });


        </script>
        <script>
            var transactions_submit_url = "<?php echo base_url('transactions/initial_submit'); ?>";
            var transactions_url = "<?php echo base_url('transactions');?>" ;
            var withdrawal_url = "<?php echo base_url('transactions/withdrawal'); ?> ";
            var credit_url = "<?php echo base_url('transactions/credit'); ?>";
            var delete_peer_url = "<?php echo base_url('deletions/delete_peer'); ?>";
            var delete_category_url = "<?php echo base_url('deletions/delete_category'); ?> ";
        </script>

        <script src="<?php echo base_url('../static/js/jquery.js'); ?>" ></script>
        <script src="<?php echo base_url('../static/js/transactions.js'); ?>" ></script>
    </body>
</html>
