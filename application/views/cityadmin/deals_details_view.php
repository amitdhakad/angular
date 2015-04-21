<?php $this->load->view('cityadmin/profile_menu') ?>

<!--Content Part Start-->

<div class="main-content container">
  <div class="row">
    <?php $this->load->view('cityadmin/profile_left') ?>
    <div class="right-part col-xs-12 col-sm-8 col-md-8" >
      <div class="white-bg">
        <h2 class="text-center title page-title border-bottom">{{deal.title}}</h2>
        <div class="row" >
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="user-image-sm col-xs-3 col-sm-2 col-md-2"> <img class="img-circle" src="{{deal.comp_person_image}}" alt="" title="" /> </div>
            <div class="col-xs-9 col-sm-10 col-md-10">
              <div class="comment-content">
                <div class="row">
                  <div class="top col-xs-12 col-sm-12 col-md-12">
                    <div class="left">
                      <h4 class="comment-user-name">{{deal.comp_person_name}}</h4>
                      <span class="update-time">{{deal.date* 1000 | date:'medium'}}</span> </div>
                    <div class="right"> Status/{{deal.status =="1"  ? 'Active' : 'Inactive'}} </div>
                  </div>
                </div>
                <div class="row">
                  <div class="comment-detail col-xs-12 col-sm-12 col-md-12">
                    <h3 class="comment-title"> Description </h3>
                    <p ng-bind-html="deal.description | nl2br"> </p>
                    <div ng-show="deal.docfile">
                      <h3 class="comment-title"> Documents File </h3>
                      <p ng-repeat="docfile in deal.docfile"> <a target="blank" href="<?php echo base_url(); ?>uploads/{{docfile.file_name}} ">{{docfile.file_name}}</a> </p>
                    </div>
                    <ul class="comment-counting">
                      <li class="first">Budget</li>
                      <li class="last">{{deal.budget}}</li>
                    </ul>
                    <div class="reply-buttons">
                      <ul>
                        <li class="first">
                          <button class="btn btn-default" ng-click="replyfrm = !replyfrm; mesgform = false">Reply</button>
                        </li>
                        <li class="last">
                          <button class="btn btn-default" ng-click="mesgform = !mesgform ;replyfrm = false">Message</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" ng-show="replyfrm || mesgform">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div>{{message}}</div>
            <div class="comment-box">
              <div class="posted-image-sm col-xs-3 col-sm-2 col-md-2"> <img title="" alt="" src="<?php echo $this->session->userdata('comp_person_image'); ?>" class="img-circle"> </div>
              <div class="reply-form col-xs-9 col-sm-10 col-md-10">
                <form  name="replyform" novalidate ng-show="replyfrm">
                  <div class="comment-wrapper">
                    <div class="comment-area float-n">
                      <textarea alt="comment" name="comment" data-ng-model="query"  required placeholder="Reply..." class="comment"></textarea>
                    </div>
                  </div>
                  <div ng-show="replyform.$submitted || replyform.comment.$touched"> <span ng-show="replyform.comment.$error.required && replyform.comment.$dirty">Please Enter Some words..</span> </div>
                  <div class="submit-button">
                    <input ng-disabled="replyform.$invalid" ng-click="deal_query(query,deal.id)" type="submit" class="btn btn-default" value="Send">
                  </div>
                </form>
                <form  name="msg"  novalidate ng-show="mesgform">
                  <div>
                    <input name="subject" data-ng-model="msge.subject" placeholder="Subject" value="" required>
                    <div ng-show="msg.$submitted || msg.subject.$touched"> <span ng-show="msg.subject.$error.required && msg.subject.$dirty">Please Enter Some words..</span> </div>
                  </div>
                  <div class="comment-wrapper">
                    <div class="comment-area float-n">
                      <textarea alt="comment" placeholder="Message..." name="massage" ng-model="msge.mssg" class="comment" required></textarea>
                    </div>
                  </div>
                  <div ng-show="msg.$submitted || msg.massage.$touched"> <span ng-show="msg.massage.$error.required && msg.massage.$dirty">Please Enter Some words..</span> </div>
                  <div class="submit-button">
                    <input ng-disabled="msg.$invalid" ng-click="deal_msg(msge,deal.id)" type="submit" class="btn btn-default" value="Send">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row"  ng-repeat="queries in query_list">
          <hr>
          <div class="col-xs-12 col-sm-12 col-md-12"  >
            <div class="posted-image-sm col-xs-3 col-sm-2 col-md-2"> <img title="" alt="" src="{{queries.comp_person_image}}" class="img-circle"> </div>
            <div class="col-xs-9 col-sm-10 col-md-10">
              <div class="comment-content">
                <div class="row">
                  <div class="top col-xs-12 col-sm-12 col-md-12">
                    <div class="left">
                      <h4 class="comment-user-name ng-binding"> Posted by <b>{{queries.name}}</b> </h4>
                    </div>
                    <div class="right">{{queries.date* 1000 | date:'medium'}}</div>
                  </div>
                </div>
                <div class="row">
                  <div class="comment-detail col-xs-12 col-sm-12 col-md-12" ng-bind-html="queries.query | nl2br"> </div>
                </div>
                
                <!--Reply Disscusion Section --->
                <div ng-if="queries.reply_list.length"  ng-attr-id="{{ 'reply_' + queries.query_id }}">
                  <hr>
                  <!--REply Msg List-->
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <p ng-if="queries.reply_list.length" class="discussion-text"   ng-init='this["reply_list_"+queries.query_id] = queries.reply_list' > 
                        <!--{{this['reply_list_'+queries.query_id]}}--> 
                        Discuss this message </p>
                      <div ng-repeat='reply_list in queries.reply_list'>
                        <div class="reply-image-sm col-xs-3 col-sm-2 col-md-2"> <img title="" alt="" src="{{reply_list.comp_person_image}}" class="img-circle"> </div>
                        <div class="col-xs-9 col-sm-10 col-md-10">
                          <div class="comment-content">
                            <div class="row">
                              <div class="top col-xs-12 col-sm-12 col-md-12">
                                <div class="left">
                                  <h4 class="comment-user-name ng-binding"> {{reply_list.name}}</h4>
                                </div>
                                <div class="right">{{reply_list.date* 1000 | date:'medium'}}</div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="comment-detail col-xs-12 col-sm-12 col-md-12" ng-bind-html="reply_list.response | nl2br"> </div>
                            </div>
                          </div>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--End --> 
                  
                  <!--Query Reply Button Div-->
                  <div class="row">
                    <ul class="btn_wrapper">
                      <li>
                        <div class="submit-button">
                          <button class="btn btn-default" ng-click="queryreplyfrm = !queryreplyfrm;">Reply</button>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!--End--> 
                  
                  <!--Query Reply Div-->
                  <div class="row" ng-show="queryreplyfrm">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="comment-box">
                        <div class="reply-image-sm col-xs-3 col-sm-2 col-md-2"> <img title="" alt="" src="<?php echo $this->session->userdata('comp_person_image'); ?>" class="img-circle"> </div>
                        <div class="reply-form col-xs-9 col-sm-10 col-md-10">
                          <form  name="queryreply" novalidate ng-show="queryreplyfrm">
                            <div class="comment-wrapper">
                              <div class="comment-area float-n">
                                <textarea alt="comment" name="queryreply" data-ng-model="reply_msg"  required placeholder="Reply..." class="comment"></textarea>
                              </div>
                            </div>
                            <div ng-show="queryreply.$submitted || queryreply.queryreply.$touched"> <span ng-show="queryreply.queryreply.$error.required && queryreply.queryreply.$dirty">Please Enter Some words..</span> </div>
                            <div class="submit-button">
                              <input ng-disabled="queryreply.$invalid" ng-click="query_reply(reply_msg,queries.query_id)" type="submit" class="btn btn-default" value="Send">
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
      </div>
    </div>
  </div>
</div>
</div>
<!--Content Part End--> 
