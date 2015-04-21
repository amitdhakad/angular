<?php $this->load->view('cityadmin/profile_menu') ?>

<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
      <?php $this->load->view('cityadmin/profile_left') ?>  

          <div class="right-part col-xs-12 col-sm-8 col-md-8" >
        	
            	<div class="white-bg">
                    <h2 class="text-center title page-title border-bottom">Profile</h2>
                 <div class="row">
                 	<div class="col-md-12 col-xs-12 col-sm-12">
                    	<div class="profile-detail">
                        	<div class="col-xs-5 col-md-3 col-sm-4">
                                <div class="profile-image">
                                <img class="img-circle" src="{{image}}" alt="" title="" />
                                </div>
                            </div>
                            <div class="col-xs-7 col-md-9 col-sm-8">
                            	<div class="profile-address">
                                    <h4 class="title">{{name}}</h4>
                                     <div class="address">{{name}}</br>
                                    <?php echo $user->comp_person_position ?> 
                                    <?php echo $user->comp_person_gender ?> 
                                    {{name}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                   	</div> 
                </div>
                </div>
        </div>
    </div>
</div>
<!--Content Part End-->