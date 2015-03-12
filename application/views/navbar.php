
<html>
    <head>
        <link rel="icon" type="image/png" href="<?php echo base_url('../static/images/icon.png'); ?>" />

        <link rel="stylesheet" href="<?php echo base_url('../static/css/bootstrap.min.css'); ?>" type="text/css"/>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url('../static/css/home_style.css'); ?>" />

        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>		
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>	        
        <link rel="stylesheet" type="text/css" href=<?php echo base_url('../static/css/about_us.css'); ?> />

    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar nav navbar-default nav-justified navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-name" href="<?php echo base_url('home'); ?>"><span class="glyphicon glyphicon-usd"></span> HOME</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                        <li><a class="navbar-name" href="<?php echo base_url('transactions'); ?>"><span class="glyphicon glyphicon-refresh"></span> TRANSACTIONS</a></li>
                        <li><a class="navbar-name"   href="<?php echo base_url('search'); ?>"><span class="glyphicon glyphicon-search"></span> SEARCH</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="name"><?php echo "Hi,&nbsp" . $name; ?></li>
                        <li><a class="navbar-name" href="<?php echo base_url('home/help'); ?>"><span ></span> HELP</a></li>
                        <li><a class="navbar-name" href="<?php echo base_url('home/about_us'); ?>"><span ></span> ABOUT  US</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle navbar-name"  data-toggle="dropdown"><span class="   glyphicon glyphicon-wrench"></span> SETTINGS<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url('settings/change_password'); ?>">Change Password</a></li>
                                <li><a href="<?php echo base_url('settings/deactivate_account'); ?>">Delete account</a></li>

                                <li class="divider"></li>
                                <li class="dropdown-header">Are you done ?</li>

                                <li><a href="<?php echo base_url('home/logout'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript"  src="<?php echo base_url('../static/js/jquery.js'); ?>" ></script>
        <script src="<?php echo base_url('../static/js/google_jquery.js'); ?>" ></script>
        <script type="text/javascript"  src="<?php echo base_url('../static/js/bootstrap.min.js'); ?>"></script> 
    </body>
</html>
