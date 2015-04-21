<?php $this->load->view('cityadmin/profile_menu') ?>

<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('cityadmin/profile_left') ?>  
        <!--Right Part Start-->
        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg">
                <h2 class="text-center title page-title border-bottom">Change Password</h2>
                <form name="passform" novalidate  id="partnerform">
                    <div class="row">
                  	<div class="col-xs-12 col-sm-8 col-md-8">{{message}}</div>
                	</div>
                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-4 col-md-3"> Old Password : </label>
                            <span class="col-xs-12 col-sm-8 col-md-9">
                                <input class="form-control" type="password" name="oldpass" data-ng-model="pass.oldpass" required>
                            </span>
                        </div>
                        <div ng-show="passform.$submitted || passform.oldpass.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                            <span ng-show="passform.oldpass.$error.required && passform.oldpass.$dirty">
                            <div class="col-xs-12 col-sm-8 col-md-8">Old Password is Required.</div>
                            </span> 
                        </div>
                    </div>
                   

                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-4 col-md-3"> Enter Password: </label>
                            <span class="col-xs-12 col-sm-8 col-md-9">
                                <input class="form-control" type="password" name="password" data-ng-model="pass.password" required>
                            </span>
                        </div>
                        <div ng-show="passform.$submitted || passform.password.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                            <span ng-show="passform.password.$error.required && passform.password.$dirty">New Password is Required.</span> 
                        </div>
                    </div>
                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-4 col-md-3"> Confirm Password: </label>
                            <span class="col-xs-12 col-sm-8 col-md-9">
                                <input class="form-control" type="password" password-match="pass.password" name="repassword" data-ng-model="pass.repassword" required>
                            </span>
                        </div>
                        <div ng-show="passform.$submitted || passform.repassword.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                            <span ng-show="passform.repassword.$error.required && passform.repassword.$dirty">Confirm Password is Required.</span> 
                            <span data-ng-show="passform.repassword.$dirty && passform.repassword.$error.passwordNoMatch && !passform.repassword.$error.required">
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                Password do not match.
                                </div>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        	<div class="submit-button">
                            <input class="btn btn-default" ng-disabled="passform.$invalid" ng-click="password(pass)" type="submit" value="Submit" id="submitbutton">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--Content Part End-->