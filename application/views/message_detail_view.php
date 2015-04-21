<?php $this->load->view('profile_menu') ?>

<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('profile_left') ?> 
        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg">
                <div class="row" >
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="user-image-sm col-xs-12 col-sm-2 col-md-2">
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 message-detail">
                            <div class="comment-content">
                                <div class="row">
                                    <div class="top col-xs-12 col-sm-12 col-md-12">
                                        <div class="left">
                                            <div class="user-detail">
                                                <div class="user-type"><?php echo $type ?> Name :</div>
                                                <h5 class="comment-user-name"><?php echo $msg->name ?></h5>
                                            </div>                                            
                                        </div>      
                                        <div class="right"><?php echo timeAgo($msg->date) ?> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="comment-detail col-xs-12 col-sm-12 col-md-12">
                                        <?php if ($msg->title) { ?>
                                            <h3 class="comment-title">
                                                Deal Title
                                            </h3>

                                            <p> <?php
                                                if ($type == 'Sender')
                                                    $url = "#/your_deal/" . $msg->slug;
                                                else
                                                    $url = "#/deals/" . $msg->slug;
                                                ?>

                                                <a href="<?php echo $url; ?>"> <?php echo $msg->title ?></a>

                                            </p> 
                                        <?php } ?>
                                        <h3 class="comment-title">
                                            Subject
                                        </h3>

                                        <p> 
                                            <?php echo $msg->subject ?>

                                        </p> 

                                        <h3 class="comment-title">
                                            Message
                                        </h3>
                                        <p> 
                                            <?php echo $msg->message ?>

                                        </p>  
                                        <div class="reply-buttons">
                                            <button class="btn btn-default" ng-click="replyfrm = !replyfrm;">Reply</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" ng-show="replyfrm">
                                    <div class="reply-form col-xs-12 col-sm-12 col-md-12">
                                        <div>{{message}}</div>

                                        <form  name="replyform" novalidate ng-show="replyfrm">

                                            <div>
                                                <input name="subject" data-ng-model="msg.subject" placeholder="Subject" value="" required>                                     
                                                <div ng-show="replyform.$submitted || replyform.subject.$touched">  
                                                    <span ng-show="replyform.subject.$error.required && replyform.subject.$dirty">Please Enter Some words..</span> 
                                                </div>
                                            </div>

                                            <div class="comment-wrapper">
                                                <div class="comment-box">                                          
                                                    <?php $reciver_id = ($type == 'Sender') ? $msg->user_id : $msg->reciver_id; ?>

                                                    <div class="comment-area" ng-init="msg.reciver_id='<?php echo $reciver_id ?>'">                                                            
                                                        <textarea alt="comment" name="comment" data-ng-model="msg.mssg"  required placeholder="Message..." class="comment"></textarea>
                                                    </div>
                                                    <div ng-show="replyform.$submitted || replyform.comment.$touched">  
                                                        <span ng-show="replyform.comment.$error.required && replyform.comment.$dirty">Please Enter Some words..</span> 
                                                    </div>

                                                    <div class="submit-button"> 
                                                        <input ng-disabled="replyform.$invalid" ng-click="send_msg(msg)" type="submit" class="btn btn-default" value="Send">    
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

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

