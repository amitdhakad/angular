<!--Top Blue Part-->
<div class="container">
    <nav class="navbar navbar-default blue-nav">
        <div class=""> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dashbord first"><a href="#/user"><i><img class="img-circle" src="<?php echo base_url() . 'assets/frontcss/' ?>images/dashbord-icon.png" alt="logo" title="" /></i><span>Dashboard</span></a> </li>
                    <li class="dropdown profile" dropdown is-open="status.profile"> 
                        <a href="javascript;:" dropdown-toggle aria-expanded="false"><i><img class="img-circle" src="<?php echo base_url() . 'assets/frontcss/' ?>images/profile-icon.png" alt="logo" title="" /></i> <span>My Profile</span> <span class="dropdown-toggle" type="button" ><span class="caret"></span></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#/profile">Profile </a></li>
                            <li><a href="#/password">Change Password</a></li>
                        </ul>

                    </li>
                    <li class="dropdown deals" dropdown is-open="status.deals"> 

                        <a href="javascript:;" dropdown-toggle aria-expanded="false"><i><img class="img-circle" src="<?php echo base_url() . 'assets/frontcss/' ?>images/dealsicon.png" alt="logo" title="" /></i> <span>Deals</span> <span class="dropdown-toggle" type="button" ><span class="caret"></span></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#/deals">Deals </a></li>
                            <li><a href="#/assigned">Assigned Deals</a></li>
                            <li><a href="#/add/deals">Add Deal</a></li>
                        </ul>               
                    </li>
                    <li class="partner"><a href="#/user"><i><img class="img-circle" src="<?php echo base_url() . 'assets/frontcss/' ?>images/partner-icon.png" alt="logo" title="" /></i><span>Partners</span></a></li>
                    <li class="message last" dropdown is-open="status.message"> 
                        <a href="javascript:;" dropdown-toggle aria-expanded="false"><i><img class="img-circle" src="<?php echo base_url() . 'assets/frontcss/' ?>images/dashbord-icon.png" alt="logo" title="" /></i> <span>Messages</span> <span class="dropdown-toggle" type="button"><span class="caret"></span></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#/message/compose">Compose Msg</a></li>
                            <li><a href="#/message">Inbox </a></li>
                            <li><a href="#/message/sent">Sent</a></li>
                        </ul>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
            <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid --> 
    </nav>
</div>


<!--Top Blue Part End--> 
