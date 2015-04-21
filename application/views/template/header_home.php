<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <title>ADAM</title>
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/style.css" rel="stylesheet" type="text/css">
        <!--bootstrap css and js-->
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/bootstrap.css" rel="stylesheet" type="text/css">

        <!-- Angular Js-->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-route.min.js"></script>
        
        <!-- End Angular Js-->
        
        
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js'></script> 
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jqueryui-1.10.3.min.js'></script>

        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/bootstrap.js"></script>
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/bootstrap.min.js"></script>

        <!--bootstrap css and js end-->

    </head>
    <body np-app="">
        <!--warpper-->
        <div id="wrapper" np-controller="maincontroller">
            <!--header-->
            <div id="header">
                <div class="container">
                    <div class="row">
                        <div class="logo col-sm-3">
                            <a href="<?php echo site_url(); ?>">
                                <img src="<?php echo base_url() . 'assets/frontcss/' ?>images/logo.png" alt="logo" title="" />
                            </a>
                        </div>

                        <div class="log-in-section col-sm-9">
                            <form action="<?php echo site_url().'home/'?>" class="pull-right" method="post">
                                <div class="input-align">
                                    <input type="text" name="email" placeholder="Enter your Email" value=""></div>
                                <div class="input-align">
                                    <?php
                                    $class='';
                                    if(form_error("pass"))
                                             $class="error"
                                    ?>
                                    <input class="<?php echo $class?>" type="password" name="pass" placeholder="Enter your Password" value=""></div>				<div class="btn-section">
                                <div class="input-align submit">
                                     
                                    <input type="submit" class="btn-top" value="Log in"></div>
                                <div class="input-align">
                                    <a href="<?php echo site_url().'home/register'?>">
                                        <button type="button" class="btn-top">Sign up</button>
                                    </a>
                                </div>
                                </div>
                            </form>
                        </div>

                    </div></div>
                <!--header end-->
            </div>