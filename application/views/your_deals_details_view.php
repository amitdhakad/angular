<?php $this->load->view('profile_menu') ?>

<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('profile_left') ?> 
        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg">
                <?php if ($deal) { ?>
                    <form name="adddeal" novalidate  id="partnerform" ng-show="addfrm">
                        <h2 class="text-center title page-title border-bottom">Edit Deal</h2>
                        <div class="row">        
                            <div class="input-row">
                                <label class="col-xs-12 col-sm-3 col-md-3"> Deal Title</label>
                                <span class="col-xs-12 col-sm-9 col-md-9">
                                    <input class="form-control" type="text" value="<?php echo $deal->title ?>" name="title" data-ng-model="deal.title" required>
                                </span>
                            </div>
                            <div ng-show="adddeal.$submitted || adddeal.title.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                                <span ng-show="adddeal.title.$error.required && adddeal.title.$dirty">Title is Required.</span> 
                            </div>
                        </div>


                        <div class="row">        
                            <div class="input-row">
                                <label class="col-xs-12 col-sm-3 col-md-3">Budget</label>
                                <span class="col-xs-12 col-sm-9 col-md-9">
                                    <input class="form-control" type="text" name="budget" data-ng-model="deal.budget" required>
                                </span>
                            </div>
                            <div ng-show="adddeal.$submitted || adddeal.budget.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                                <span ng-show="adddeal.budget.$error.required && adddeal.budget.$dirty">Budget is Required.</span> 
                            </div>
                        </div>
                        <div class="row">        
                            <div class="input-row">
                                <label class="col-xs-12 col-sm-3 col-md-3">Description</label>
                                <span class="col-xs-12 col-sm-9 col-md-9">
                                    <!--<textarea class="form-control" name="description" data-ng-model="deal.description" required></textarea>-->
                                    <div text-angular=""  data-ng-model="deal.description"></div>
                                </span>
                            </div>
                            <div ng-show="adddeal.$submitted || adddeal.description.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                                <span ng-show="adddeal.description.$error.required && adddeal.description.$dirty">Description is Required.</span> 
                            </div>
                        </div>
                        <div class="row">        
                            <div class="input-row">                            
                                <label class="col-xs-12 col-sm-3 col-md-3">Document File</label>
                                <span class="col-xs-12 col-sm-9 col-md-9">
                                     <div class="submit-button">
                                        <button class="btn btn-default" ng-file-select ng-model="files" ng-multiple="true">Attach Any File</button>
                                    </div>
                                    <ul style="clear:both" ng-show="files.length > 0" class="response">
                                        <li class="sel-file" ng-repeat="f in files">                    
                                            <span class="progress" ng-show="f.progress >= 0">						
                                                <div style="width:{{f.progress}}%">{{f.progress}}%</div>
                                            </span>                     
                                        </li>
                                    </ul>

                                    <div ng-if='deal.docfile.length'>                                                                                          
                                        <span id="{{file.id}}" ng-repeat='file in deal.docfile'>
                                            <a  class="fancybox button-file" href="<?php echo base_url() . 'uploads/' ?>{{file.file_name}}" target="blank">
                                                {{file.file_name}}
                                            </a> 
                                            <span ng-click="removefile(file.id)">X</span><br>
                                        </span>                                           
                                    </div>

                                </span>
                            </div>                        
                        </div>

                        <div class="row">        
                            <div class="input-row">
                                <label class="col-xs-12 col-sm-3 col-md-3">Search Key-Word</label>
                                <span class="col-xs-12 col-sm-9 col-md-9">
                                    <input type="text" class="form-control" name="search_keyword" data-ng-model="deal.search_keyword" required></textarea>
                                </span>
                            </div>
                            <div ng-show="adddeal.$submitted || adddeal.search_keyword.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                                <span ng-show="adddeal.search_keyword.$error.required && adddeal.search_keyword.$dirty">Search Key-Word is Required.</span> 
                            </div>
                        </div>
                        <div class="row">        
                            <div class="input-row">
                                <label class="col-xs-12 col-sm-3 col-md-3">Assign To</label>
                                <span class="col-xs-12 col-sm-9 col-md-9">                          
                                    <!--<input type="text" name="assign_to" data-ng-model="deal.assign_to" placeholder="Assign to" typeahead="user.name for user in users  | filter:$viewValue" class="form-control">-->
                                    <select class="form-control" setSeletected="0" data-ng-model="deal.assign_to" required>
                                        <option value="0">Public</option>
                                        <?php
                                        foreach ($users as $userss) {
                                            echo "<option value='$userss->u_id'>$userss->comp_person_name</option>";
                                        }
                                        ?>
                                    </select>
                                </span>
                            </div>                        
                        </div>
                        <div class="row">        
                            <div class="input-row">
                                <label class="col-xs-12 col-sm-3 col-md-3">Status</label>
                                <span class="col-xs-12 col-sm-9 col-md-9">                          
                                    <select class="form-control" setSeletected="0" data-ng-model="deal.status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </span>
                            </div>                        
                        </div>

                        <!--                        <div class="row" ng-show='!deal.status'>        
                                                    <div class="input-row">
                                                        <label class="col-xs-12 col-sm-3 col-md-3">Deactive Reason</label>
                                                        <span class="col-xs-12 col-sm-9 col-md-9">                          
                                                            <textarea class="form-control" placeholder="Enter Deactive Reason" required></textarea>
                                                        </span>
                        
                                                    </div>                        
                                                </div>-->


                        <div class="row">
                            <label class="col-xs-12 col-sm-3 col-md-3"></label>
                            <div class="col-md-9">
                                <div class="submit-button">
                                    <input class="btn btn-default" ng-disabled="adddeal.$invalid" ng-click="update_deal(deal)" type="submit" value="Submit" id="submitbutton">
                                    <input type="button" class="btn btn-default" value="Cancel" ng-click="addfrm=!addfrm">
                                </div>
                            </div>
                        </div>
                    </form>



                    <div ng-show="!addfrm ||!addfrm ">
                        <h2 class="text-center title page-title border-bottom">{{dealshow.title}}</h2>
                        <div ng-show="!addfrm" class="submit-button add_deal_btn">
                            <button class="btn btn-default" ng-click="addfrm=!addfrm">Edit Deal</button>
                        </div>

                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="user-image-sm col-xs-12 col-sm-2 col-md-2"> 
                                    <img class="img-circle" src="{{dealshow.comp_person_image}}" alt="" title="" /> 
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10">
                                    <div class="comment-content">
                                        <div class="row">
                                            <div class="top col-xs-12 col-sm-12 col-md-12">
                                                <div class="left">
                                                    <h4 class="comment-user-name">{{dealshow.comp_person_name}}</h4>
                                                    <span class="update-time">{{dealshow.date* 1000 | date:'medium'}}</span>  
                                                </div>      
                                                <div class="right">Status/{{deal.status =="1"  ? 'Active' : 'Inactive'}}</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="comment-detail col-xs-12 col-sm-12 col-md-12">
                                                <h3 class="comment-title">
                                                    Description
                                                </h3>
                                                <p ng-bind-html="dealshow.description | nl2br">
                                                </p>
                                                <div ng-if="deal.docfile.length">
                                                    <h3 class="comment-title">
                                                        Documents File
                                                    </h3>

                                                    <p ng-repeat="docfile in deal.docfile">
                                                        <a target="blank" href="<?php echo base_url(); ?>uploads/{{docfile.file_name}} ">{{docfile.file_name}}</a><br>
                                                    </p>
                                                </div>

                                                <ul class="comment-counting">
                                                    <li class="first">Budget</li>
                                                    <li class="last">{{dealshow.budget}}</li>

                                                    <li class="first">Assign To </li>
                                                    <li class="last">                                                
                                                        {{dealshow.assign_to =="0"  ? 'Public' : dealshow.assign_name }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php //foreach ($query as $query) { ?>
                        <div class="row" ng-repeat="query in query">
                            <hr>
                            <div class="col-xs-12 col-sm-12 col-md-12"  >
                                <div class="posted-image-sm col-xs-3 col-sm-2 col-md-2"> 
                                    <img title="" alt="" src="{{query.comp_person_image}}" class="img-circle"> 
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10">                         
                                    <div class="comment-content">
                                        <div class="row">
                                            <div class="top col-xs-12 col-sm-12 col-md-12">
                                                <div class="left">
                                                    <h4 class="comment-user-name ng-binding"> 
                                                        Posted by <b>{{query.name }}</b>
                                                    </h4>
                                                </div>  
                                                <div class="right">{{query.date* 1000 | date:'medium'}}</div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="comment-detail col-xs-12 col-sm-12 col-md-12"> 
                                                {{query.query}}
                                            </div>
                                        </div>



                                        <!--Reply Disscusion Section --->
                                        <div>   
                                            <hr>
                                            <!--REply Msg List-->
                                            <div class="row">

                                                <p ng-if="(query.reply_list).length" class="discussion-text"> 
                                                    <!--{{this['reply_list_'+queries.query_id]}}-->
                                                    Discuss this message
                                                </p>

                                                <div class="col-xs-12 col-sm-12 col-md-12" ng-repeat="reply_list in query.reply_list">
                                                    <div class="reply-image-sm col-xs-3 col-sm-2 col-md-2"> 
                                                        <img title="" alt="" src="{{reply_list.comp_person_image}}" class="img-circle"> 
                                                    </div>
                                                    <div class="col-xs-12 col-sm-10 col-md-10">  
                                                        <div class="comment-content">
                                                            <div class="row">
                                                                <div class="top col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="left">  <h4 class="comment-user-name ng-binding">{{reply_list.name}}</h4> </div>  
                                                                    <div class="right">{{reply_list.date}}</div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="comment-detail col-xs-12 col-sm-12 col-md-12"  ng-bind-html="reply_list.response | nl2br">   
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
                                                            <button class="btn btn-default" ng-click="queryreplyfrm=!queryreplyfrm">Reply</button>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div> 
                                            <!--End-->


                                            <!--Query Reply Div-->
                                            <div class="row" ng-show='queryreplyfrm'>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="comment-box">
                                                        <div class="reply-image-sm col-xs-3 col-sm-2 col-md-2"> 
                                                            <img title="" alt="" src="<?php echo $this->session->userdata('comp_person_image'); ?>" class="img-circle"> 
                                                        </div>
                                                        <div class="reply-form col-xs-9 col-sm-10 col-md-10">                                
                                                            <form  name="queryreply" novalidate ng-show='queryreplyfrm'>                                    
                                                                <div class="comment-wrapper">
                                                                    <div class="comment-area float-n">                                   
                                                                        <textarea alt="comment" name="queryreply" data-ng-model="reply_msg"  required placeholder="Reply..." class="comment"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div ng-show="queryreply.$submitted || queryreply.queryreply.$touched">  
                                                                    <span ng-show="queryreply.queryreply.$error.required && queryreply.queryreply.$dirty">Please Enter Some words..</span> 
                                                                </div>
                                                                <div class="submit-button">
                                                                    <input ng-disabled="queryreply.$invalid" ng-click="query_reply(reply_msg,query.query_id)" type="submit" class="btn btn-default" value="Send">    
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
                        <?php //} ?>
                    </div>
                    <?php
                } else {

                    echo "No deals !!";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<!--Content Part End-->
