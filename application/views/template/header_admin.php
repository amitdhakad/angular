<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $base_url = base_url(); ?>
        <meta charset="utf-8" />
        <title>Adamglobal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Footlabs" />
        <meta name="author" content="The Red Team" />
        <link href="<?php echo $base_url ?>assets/css/styles.min.css" rel="stylesheet" type='text/css' media="all" />
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css' />
        <link href='<?php echo $base_url ?>assets/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='styleswitcher' />
        <link href='<?php echo $base_url ?>assets/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='headerswitcher' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/codeprettifier/prettify.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/form-toggle/toggles.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/form-select2/select2.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/form-multiselect/css/multi-select.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/js/jqueryui.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/codeprettifier/prettify.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/form-toggle/toggles.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/datatables/dataTables.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/codeprettifier/prettify.css' />
        <link rel='stylesheet' type='text/css' href='<?php echo $base_url ?>assets/plugins/form-toggle/toggles.css' />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <header class="navbar navbar-inverse navbar-fixed-top" role="banner"> <a id="leftmenu-trigger" class="pull-left" data-toggle="tooltip" data-placement="bottom" title="Toggle Left Sidebar"></a> 
        <!--<a id="rightmenu-trigger" class="pull-right" data-toggle="tooltip" data-placement="bottom" title="Toggle Right Sidebar"></a>-->
        <div class="navbar-header pull-left"> <a class="navbar-brand" href="<?php echo site_url() . 'admin/users'; ?>">ADAM</a> </div>
        <ul class="nav navbar-nav pull-right toolbar">
            <?php
            $user_data = $this->user_model->user_details(array('p_u_id' => $this->session->userdata('u_id')));
            ?>
            <li class="dropdown"> <a href="#" class="dropdown-toggle username" data-toggle="dropdown"> <span class="hidden-xs"><?php echo $this->session->userdata('u_email'); ?> <i class="icon-caret-down icon-scale"></i> </span> <img src="<?php echo $user_data[0]->comp_person_image ?>"  /> </a>
                <ul class="dropdown-menu userinfo arrow">
                    <li class="username"> <a href="#">
                            <div class="pull-left"> <img class="userimg" src="<?php echo $user_data[0]->comp_person_image ?>" /> </div>
                            <div class="pull-right">
                                <h5><?php echo $user_data[0]->comp_person_name ?> </h5>
                                <small>Logged in as <br>
                                    <span><?php echo $this->session->userdata('u_email') ?></span></small> </div>
                        </a> </li>
                    <li class="userlinks">
                        <ul class="dropdown-menu">
                          <!--<li><a href="<?php echo site_url() . 'admin/users/profile_edit' ?>">Edit Profile <i class="pull-right icon-pencil"></i></a></li>-->
                            <li><a href="<?php echo site_url() . "admin/home/logout" ?>" class="text-right">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php
            $message = $this->user_model->message();
            $i = count($message);
            ?>
            <li class="dropdown"> <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><i><img src="<?php echo base_url(); ?>assets/frontcss/images/msg-icon.png"/></i><span class="badge">
                        <?php echo $i; ?>
                    </span></a>
                <ul class="dropdown-menu notifications arrow">
                    <li> <span>You have <?php echo $i; ?> new Message </span> <span></span> </li>
                    <?php
                    if ($message) {
                        foreach ($message as $message) {
                            $href = site_url() . 'admin//message/details/' . $message->msg_id . '/recive';
                            ?>
                            <li> <a href="<?php echo $href; ?>" class="notification-user active"> <span class="time"> <?php echo $message->name; ?> </span> <i class="icon-plus-sign "></i> <span class="msg"> <?php echo $message->subject; ?> </span> </a> </li>
                            <?
                        }
                    }
                    ?>
                </ul>
            </li>
            <?php
            $approval = $this->user_model->approval();
            $i = count($approval);
            ?>
            <li class="dropdown"> <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><i><img src="<?php echo base_url(); ?>assets/frontcss/images/nitfication-bell.png"/></i><span class="badge">
                        <?php echo $i; ?>
                    </span></a>
                <ul class="dropdown-menu notifications arrow">
                    <li> <span>You have <?php echo $i; ?> new Approval Request </span> <span></span> </li>
                    <?php
                    if ($approval) {
                        foreach ($approval as $approval) {
                            $href = site_url() . 'admin/users/approval/';
                            ?>
                            <li> <a href="<?php echo $href; ?>" class="notification-user active"> <span class="time"> <?php echo $approval->city_name; ?> </span> <i class="icon-plus-sign "></i> <span class="msg"> <?php echo $approval->comp_person_name; ?> </span> </a> </li>
                            <?
                        }
                    }
                    ?>
                </ul>
            </li>
            <?php
            $reply_count = $this->user_model->replyalert();
            $query_count = $this->user_model->query_alert($this->session->userdata('u_id'));
            $query_count = array_merge($query_count, $reply_count);
            $i = count($query_count);
            ?>
            <li class="dropdown"> <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><i><img src="<?php echo base_url(); ?>assets/frontcss/images/nitfication-bell.png"/></i><span class="badge">
                        <?php echo $i; ?>
                    </span></a>
                <ul class="dropdown-menu notifications arrow">
                    <li> <span>You have <?php echo $i; ?> new Query notification </span> <span></span> </li>
                    <?php
                    foreach ($query_count as $q_count) {
                        $href = site_url() . 'admin/deals/query_alert/' . base64_encode($q_count->query_id);
                        ?>
                        <li> <a href="<?php echo $href; ?>" class="notification-user active"> <span class="time"> New Query </span> <i class="icon-plus-sign "></i> <span class="msg"> <?php echo $q_count->name . ' - ' . $q_count->title; ?> </span> </a> </li>
                    <? }
                    ?>
                </ul>
            </li>
        </ul>
    </header>
    <div id="page-container">
        <!-- BEGIN SIDEBAR -->
        <nav id="page-leftbar" role="navigation"> 
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">
                <li id="search"> <a href="javascript:;"><i class="icon-search opacity-control"></i></a>
                    <form />

                    <input type="text" class="search-query" placeholder="Search..." />
                    <button type="submit"><i class="icon-search"></i></button>
                    </form>
                </li>
                <li><a href="<?php echo site_url() . 'admin/users'; ?>">
                        <i><img src="<?php echo base_url() . 'assets/css/' ?>fb_images/dashbord-icon.png" alt="Dashbord" title="" /></i> 
                        <span>Dashboard</span></a></li>
                <li> 
                    <a href="javascript:;">
                        <i><img src="<?php echo base_url() . 'assets/css/' ?>fb_images/profile-icon.png" alt="profile" title="" /></i>
                        <span>Users</span>
                    </a>
                    <ul class="acc-menu">
                        <li><a href="<?php echo site_url() . 'admin/users/index'; ?>"><span>City Admin List</span></a></li>
                        <li><a href="<?php echo site_url() . 'admin/users/approval'; ?>"><span>Approval List</span></a></li>
                        <li><a href="<?php echo site_url() . 'admin/users/all'; ?>"><span>All User List</span></a></li>
                        <li><a href="<?php echo site_url() . 'admin/users/reject'; ?>"><span>Rejected User List</span></a></li>
                    </ul>
                </li>
                <li> <a href="javascript:;">
                        <i><img src="<?php echo base_url() . 'assets/css/' ?>fb_images/dealsicon.png" alt="Deals" title="" /></i>
                        <span>Deals</span></a>
                    <ul class="acc-menu">
                        <li><a href="<?php echo site_url() . 'admin/deals/index'; ?>"><span>Deals</span></a></li>
                        <li><a href="<?php echo site_url() . 'admin/deals/add'; ?>"><span>Add Deals </span></a></li>
                    </ul>
                </li>
                <li> <a href="javascript:;">
                        <i><img src="<?php echo base_url() . 'assets/css/' ?>fb_images/partner-icon.png" alt="Deals" title="" /></i>
                        <span>Message</span></a>
                    <ul class="acc-menu">
                        <li><a href="<?php echo site_url() . 'admin/message/index'; ?>"><span>Message</span></a></li>
                        <li><a href="<?php echo site_url() . 'admin/message/send'; ?>"><span>Send Message</span></a></li>
                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU --> 
        </nav>
