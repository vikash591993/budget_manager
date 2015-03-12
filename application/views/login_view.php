<!DOCTYPE html>
<head>
    <title>login</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('../static/images/icon.png'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('../static/css/bootstrap.min.css'); ?>" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url('../static/css/grayscale.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('../static/css/font-awesome.min.css'); ?>"  />

    <link href='http://fonts.googleapis.com/css?family=Play:400,700&subset=latin,cyrillic-ext,greek-ext,greek,latin-ext,cyrillic' rel='stylesheet' type='text/css'>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <img style="float:top;margin-left:120px;margin-top:5px;vertical-align:middle;display:inline;" src="<?php echo base_url('../static/images/wallet.png'); ?>" width="55" height="55"/>
        <h5 style="display:inline;font-weight:bold;font-size:20px;">Budget<span style="color: goldenrod; ">Manager</span></h5>
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">

                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class=" active page-scroll">
                    <a href="#about">About</a>

                </li>
                <li class="page-scroll">
                    <a href="#register">Register</a>

                </li>

                <li class="page-scroll">
                    <a href="#login">Login</a>
                </li>

            </ul>
        </div>
        <!-- navbar-collapse -->

        <!-- /.container -->
    </nav>

    <section style="padding-top:20px;" id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8">
                <!--carousel part-->
                <div class="container">
                    <div id="mycarousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#mycarousel" data-slide-to="1"></li>
                            <li data-target="#mycarousel" data-slide-to="2"></li>

                        </ol>


                        <div class="carousel-inner">
                            <div class="item active">
                                <img style="opacity: 0.9"  class="carousel-item" src=<?php echo base_url('../static/images/carousel1.jpg'); ?> />
                                <div class="carousel-caption">

                                    <h3 style="color:white;font-family: 'play',sans-serif;"><span style="text-decoration: underline;"><span style="color: white;">Budget</span><span style="color: goldenrod;">Manager</span></span>  is  a  <span style="color: white;text-decoration:underline;">free</span>,  easy  to  use  online  budget  for  you.  It  will  help  you  manage  your  expenses ,keep  track  of  them  and  find  the  best  ways  to  get  out  of  debt  and  start  saving  money  for  the  future. </h3>
                                </div>                    
                            </div>
                            <div class="item">
                                <img style="opacity: 0.5" class="carousel-item" src=<?php echo base_url('../static/images/money2.jpg'); ?> />
                                <div class="carousel-caption">
                                    <h1 style="font-family: 'play',sans-serif;color: white";>Why Budget<span style="color: goldenrod;">Manager?</span></h1>

                                    <h3 style="color: white;font-family: 'play',sans-serif;"><span style="text-decoration: underline;"><span style="color: white">Budget</span><span style="color: goldenrod;">Manager</span> </span> makes  finance  easy.  We  do  not  over complicate  things.  We have created  a  fast , secure,  and  simple  environment  for  an  exceptional  budgeting  experience.    We  guarantee  you  will  save  money  and  understand  your  finances  better  within  the  first  hour  of  using  <span style="text-decoration: underline;">Budget<span style="color: goldenrod;"> Manager.</span></span> </h3>



                                </div>
                            </div>

                        </div>
                        <a class="left carousel-control" href="#mycarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                        <a class="right carousel-control" href="#mycarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>   
            </div>
        </div>


    </section>
    <section style="padding-top:90px; padding-bottom:150px;" id="register" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">

                <h1>  Sign Up...</h1>
                <hr>
                <form id="register_form" style="margin-left:240px;" class="form-horizontal"  >
                    <div class="form-group">
                        <label class="col-sm-1 control-label"><span class="glyphicon glyphicon-user"></span></label>
                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" placeholder="username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label"><span class="glyphicon glyphicon-envelope"></span></label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" placeholder="Email Id" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label"><span class="glyphicon glyphicon-lock "></span></label>
                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label"><span class="glyphicon glyphicon-hand-up"></span></label>
                        <div class="col-sm-5">
                            <input type="number" step="any" name="cash_in_hand" class="form-control" placeholder="Cash In Hand"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label"><span class="glyphicon glyphicon-briefcase"></span></label>
                        <div class="col-sm-5">
                            <input type="number" step="any" name="cash_in_bank" class="form-control" placeholder="Cash In Bank" />
                        </div>
                    </div>

                    <div  class="form-group">
                        <button  type="submit" class="btn btn-danger">Sign Up</button>
                    </div>




                </form>

                <hr>
            </div>

        </div>
    </section>
    <section style="padding-top:250px; padding-bottom:85px;" id="login" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Login..</h2>
                <hr>
                <form id="login_form" style="margin-left:280px;" class="form-horizontal" method="post" action="<?php echo base_url('home/login_submit'); ?>">
                    <div class="form-group">
                        <label class="col-sm-1 control-label"><span class="glyphicon glyphicon-envelope"></span></label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" placeholder="Email Id"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label"><span class="glyphicon glyphicon-lock "></span></label>
                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div  class="form-group">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>


                </form>
                <hr>
            </div>
        </div>
    </section>
    <script  src="<?php echo base_url('../static/js/jquery.js'); ?>" ></script>
    <script src="<?php echo base_url('../static/js/jquery.validate.js'); ?>" > </script>
    <script src="<?php echo base_url('../static/js/bootstrap.min.js'); ?>" ></script>
    <script  src="<?php echo base_url('../static/js/grayscale.js'); ?>" ></script>
    <script>
        var register_submit_url = "<?php echo base_url('home/register_submit'); ?>";
        var login_url = "<?php echo base_url('home#login'); ?> ";
        var login_submit_url = "<?php echo base_url('home/login_submit'); ?>";
        var home_url = "<?php echo base_url('home'); ?>";
    </script>
    
    <script src="<?php echo base_url('../static/js/register.js'); ?>" ></script>
    <script src="<?php echo base_url('../static/js/login.js'); ?>" ></script>
</body>
</html>

</body>
</html>