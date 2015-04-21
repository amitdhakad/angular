<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <title>ADAM</title>
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/style.css" rel="stylesheet" type="text/css">

        <!--bootstrap css and js-->

        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/responsive.css" rel="stylesheet" type="text/css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!--bootstrap css and js-->
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/bootstrap.js"></script>
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/bootstrap.min.js"></script>
        <!--bootstrap css and js end-->

        <!-- Angular Js-->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.3/angular-route.min.js"></script>
        <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.1.js"></script>
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/toaster.js"></script>
        <!-- End Angular Js-->


        <!--Angula cSS-->
        <link href="//netdna.boxotstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" data-semver="4.3.0" data-require="font-awesome@*" />
        <link href="//cdn.jsdelivr.net/angular.textangular/1.3.7/textAngular.css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'assets/frontcss/' ?>css/toaster.css" rel="stylesheet" type="text/css">
        <!--Angula cSS-->

        <script>
            var site_url = "<?php echo site_url() ?>";
            var base_url = "<?php echo base_url() ?>";
        </script>
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/dirPagination.js"></script>
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/frontenduser.js"></script>
        <script src="http://cdn.jsdelivr.net/g/angular.textangular@1.3.7(textAngular-rangy.min.js+textAngular-sanitize.min.js+textAngular.min.js)"></script>
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/angular-file-upload-shim.js"></script>
        <script src="<?php echo base_url() . 'assets/frontcss/' ?>js/angular-file-upload.js"></script>
        
    </head>
    <body ng-app="adamglobal">
    <toaster-container toaster-options="{'time-out': 2000}"></toaster-container>
    <!--warpper-->
    <div id="wrapper">
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="logo col-xs-12 col-sm-3 col-md-3">
                        <a href="#/">
                            <img src="<?php echo base_url() . 'assets/frontcss/' ?>images/logo.png" alt="logo" title="" />
                        </a>
                    </div>

                    <div class="log-in-section col-xs-12 col-sm-9 col-md-9" ng-controller="home">
                        <div ng-if="authenticated" class="header-r-section">
                            <div class="notification" ng-controller='alert'>  

                                <div class="dropdown deals" dropdown is-open="status.query">
                                    <a dropdown-toggle aria-expanded="false" href="javascript:;">
                                        <img src="<?php echo base_url() . 'assets/frontcss/' ?>images/nitfication-bell.png" alt="Notification" title="" />			
                                        <i class="badge">{{alertquery.length}}</i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" >
                                        <li>
                                            <a href="javascript:;">
                                                <span>You have {{alertquery.length}} new Query notification </span>
                                            </a>
                                        </li>
                                        <li ng-repeat="queryalert in alertquery">
                                            <a href="#/query/{{queryalert.query_id}}" class="notification-user active">
                                                <span class="time"> New Query</span>                                                     
                                                <span class="msg">{{queryalert.name}} - {{queryalert.title}}</span>
                                            </a>
                                        </li>                                           
                                    </ul>
                                </div>
                                <div class="dropdown deals" dropdown is-open="status.msg">
                                    <a dropdown-toggle aria-expanded="false" href="javascript:;">
                                        <img src="<?php echo base_url() . 'assets/frontcss/' ?>images/msg-icon.png" alt="mail" title="" />	 					
                                        <i class="badge">{{alertmsg.length}}</i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                      <li>
                                            <a href="javascript:;">
                                                <span>You have {{alertmsg.length}} new Message </span>
                                            </a>
                                        </li>
                                        <li ng-repeat="msgalert in alertmsg">
                                            <a href="#/details/{{msgalert.msg_id}}/Sender" class="notification-user active">
                                                <span class="time">{{msgalert.name}}</span>                                                     
                                                <span class="msg"> {{msgalert.subject}}</span>
                                            </a>
                                        </li>  
                                    </ul>

                                </div>

                            </div>

                            <div  class="login-top">
                                <div class="user-image"> <img class="img-circle" src="{{image}}" alt="logo" title="" /> </div>
                                <div class="btn-group" dropdown is-open="status.isopen">
                                    <div class="user-name" dropdown-toggle aria-expanded="false">
                                        {{messagess}} welcome, <span>{{name}}</span> 
                                        <span  class="dropdown-toggle"   type="button" ><span class="caret"></span></span>
                                    </div>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#/user">Profile </a></li>    
                                        <li><a href="#/password">Change Password </a></li>    
                                        <li><a href="javascript:;" ng-click="logout()">Logout </a></li>
                                    </ul>
                                </div>
                            </div>

                        </div> 
                        <?php //} else { ?>

                        <form ng-if="!authenticated" action="javascript:;"  class="pull-right">
                            <div class="input-align">
                                <input type="text" id="lemail"  ng-model="formData.email" placeholder="Enter your Email"></div>
                            <div class="input-align">                                    
                                <input id="lpass" ng-model="formData.pass"  type="password"  placeholder="Enter your Password"></div>				<div class="btn-section">
                                <div class="input-align submit">
                                    <input type="submit" class="btn-top" ng-click="login()" value="Log in">
                                </div>
                                <div class="input-align">
                                    <a href="#/signup">
                                        <button type="button" class="btn-top">Sign up</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <?php //} ?>
                    </div>

                </div>
            </div>
            <!--header end-->
        </div>

        <!--Page Content-->
        <div ng-view>

        </div>
        <?php $this->load->view('template/footer') ?>
        <!--warpper end-->

        <script type="text/javascript" src='<?php echo base_url(); ?>assets/js/jquery.fancybox.js'></script>
        <link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/css/jquery.fancybox.css' media="screen" />

        <script>
            $(function() {
                $(".fancyboxifrm").fancybox({
                    iframe: {
                        preload: false
                    }
                });
            });


            $('textarea').keyup(insertNewlines);
            /*-----its use to add /n for  texarea  ------*/
            function insertNewlines(e) {
                // Get the number of cols defined (where we will insert breaks manually
                var rowMaxChars = $(this).attr('cols');

                // Calculate the row we were on as newlines + 1
                var rowNum = ($(this).val().match(/\n/g) != null) ? $(this).val().match(/\n/g).length + 1 : 1;

                // If the chars in $(this) are greater than rowMaxChars * rowNum then insert newline
                if ($(this).val().length > rowMaxChars * rowNum && e.keyCode != 8) {
                    $(this).val($(this).val() + "\n");
                }
                return true;
            }

        </script>
    </div>
</body>
</html>
