<?php $this->load->view('cityadmin/profile_menu') ?>

<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('cityadmin/profile_left') ?> 
        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg">

                <h2 class="text-center title page-title border-bottom ">Query Alert</h2>

                <?php foreach ($query as $query) { ?>
                    <div class="row">                       
                        <div class="col-xs-12 col-sm-12 col-md-12"  >
                            <div class="posted-image-sm col-xs-3 col-sm-2 col-md-2"> 
                                <img title="" alt="" src="<?php echo $query->comp_person_image ?>" class="img-circle"> 
                            </div>
                            <div class="col-xs-12 col-sm-10 col-md-10">                         
                                <div class="comment-content">
                                    <div class="row">
                                        <div class="top col-xs-12 col-sm-12 col-md-12">
                                            <div class="left">
                                                <h4 class="comment-user-name ng-binding"> 
                                                    Posted by <b><?php echo $query->name ?></b>
                                                </h4>
                                            </div>  
                                            <div class="right"><?php echo timeAgo($query->date) ?></div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="comment-detail col-xs-12 col-sm-12 col-md-12"> 
                                            <?php echo nl2br($query->query); ?>
                                        </div>
                                    </div>



                                    <!--Reply Disscusion Section --->
                                    <div>   
                                        <hr>
                                        <!--REply Msg List-->
                                        <div class="row" ng-if="query_discuss.length">                                           
                                            <p  class="discussion-text"> 
                                                Discuss this message
                                            </p>

                                            <div class="col-xs-12 col-sm-12 col-md-12" ng-repeat="discuss in query_discuss">
                                                <div class="reply-image-sm col-xs-3 col-sm-2 col-md-2"> 
                                                    <img title="" alt="" src="{{discuss.comp_person_image}}" class="img-circle"> 
                                                </div>
                                                <div class="col-xs-12 col-sm-10 col-md-10">  
                                                    <div class="comment-content">
                                                        <div class="row">
                                                            <div class="top col-xs-12 col-sm-12 col-md-12">
                                                                <div class="left">  <h4 class="comment-user-name ng-binding">{{discuss.name}}</h4> </div>  
                                                                <div class="right">{{discuss.date* 1000 | date:'medium'}}</div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="comment-detail col-xs-12 col-sm-12 col-md-12" ng-bind-html="discuss.response | nl2br">   

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                        </div>
                                        <!--End -->

                                        <!--Query Reply Button Div-->
                                        <div class="row">                                    
                                            <ul class="btn_wrapper">
                                                <li class="first">
                                                    <div class="submit-button">
                                                        <button class="btn btn-default" ng-click="queryreplyfrm = !queryreplyfrm<?php echo $query->query_id ?>;">Reply</button>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div> 
                                        <!--End-->

                                        <!--Query Reply Div-->
                                        <div class="row" ng-show="queryreplyfrm">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="comment-box">
                                                    <div class="reply-image-sm col-xs-3 col-sm-2 col-md-2"> 
                                                        <img title="" alt="" src="<?php echo $this->session->userdata('comp_person_image'); ?>" class="img-circle"> 
                                                    </div>
                                                    <div class="reply-form col-xs-9 col-sm-10 col-md-10">                                
                                                        <form  name="queryreply" novalidate ng-show="queryreplyfrm">                                    
                                                            <div class="comment-wrapper">
                                                                <div class="comment-area float-n">                                   
                                                                    <textarea alt="comment" name="queryreply" data-ng-model="reply_msg"  required placeholder="Reply..." class="comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div ng-show="queryreply.$submitted || queryreply.queryreply.$touched">  
                                                                <span ng-show="queryreply.queryreply.$error.required && queryreply.queryreply.$dirty">Please Enter Some words..</span> 
                                                            </div>
                                                            <div class="submit-button">
                                                                <input ng-disabled="queryreply.$invalid" ng-click="query_reply(reply_msg,<?php echo $query->query_id ?>)" type="submit" class="btn btn-default" value="Send">    
                                                            </div>
                                                        </form>                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End-->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>
<!--Content Part End-->
