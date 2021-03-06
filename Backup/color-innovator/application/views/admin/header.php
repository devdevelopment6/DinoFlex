<!DOCTYPE html>

<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta charset="utf-8" />

    <title>Admin | <?php echo $title; ?></title>

    <meta name="description" content="overview &amp; stats" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



    <!-- bootstrap & fontawesome -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/font-awesome/4.7.0/css/font-awesome.min.css" />



    <!-- page specific plugin styles -->

    <!-- text fonts -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/fonts/fonts.googleapis.com.css" />


    <!-- ace styles -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--[if lte IE 9]>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />

    <![endif]-->



    <!--[if lte IE 9]>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.min.css" />

    <![endif]-->



    <!-- inline styles related to this page -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>

    <!-- ace settings handler -->

    <script src="<?php echo base_url(); ?>admin_assets/js/ace-extra.min.js"></script>

	  <script type="text/javascript" src="<?php echo base_url();?>admin_assets/js/additional-methods.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->



    <!--[if lte IE 8]>

    <script src="<?php echo base_url(); ?>assets/js/html5shiv.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>

    <![endif]-->





    <!-- TECHYBIRDS STYLES AND EXTRA CSS START -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin_assets/css/jquery-confirm.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin_assets/css/techybirds.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin_assets/css/dashboard.css">



    <!-- TECHYBIRDS STYLES AND EXTRA CSS END -->


</head>



<body class="no-skin">

<input type="hidden" id="base_path" value="<?php echo base_url(); ?>">

<div id="navbar" class="navbar navbar-default">

    <script type="text/javascript">

        try{ace.settings.check('navbar' , 'fixed')}catch(e){}

    </script>

    <div class="navbar-container" id="navbar-container">

        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">

            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

        </button>

        <div class="navbar-header pull-left">

            <a href="<?php echo base_url();?>admin/" class="navbar-brand"> <small> <i class="fa fa-leaf"></i> Admin Panel - DinoFlex </small> </a>

        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">

            <ul class="nav ace-nav">

                <li class="light-blue">

                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">

                        <!--<img class="nav-user-photo" src="<?php echo base_url(); ?>assets/avatars/user.jpg" alt="Jason's Photo" />-->

                        <span class="user-info"> <small>Welcome,</small> <?php echo $logedin['username']; ?> </span>

                        <i class="ace-icon fa fa-caret-down"></i>

                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li> <a href="<?php echo base_url(); ?>admin/settings"> <i class="ace-icon fa fa-cog"></i> Color Innovator Settings </a> </li>
                        <li> <a href="<?php echo base_url(); ?>admin/change_password"> <i class="ace-icon fa fa-cog"></i> Change Password </a> </li>

						 <?php if($logedin['user_type_id']	==	11) { ?><li> <a href="<?php echo base_url(); ?>customer_profile/"> <i class="ace-icon fa fa-user"></i> Profile </a> </li><?php } ?>

                        <li class="divider"></li>

                        <li> <a href="<?php echo base_url(); ?>admin/logout"> <i class="ace-icon fa fa-power-off"></i> Logout </a> </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

    <!-- /.navbar-container -->

</div>

<div class="main-container" id="main-container">

    <script type="text/javascript">

        try{ace.settings.check('main-container' , 'fixed')}catch(e){}

    </script>