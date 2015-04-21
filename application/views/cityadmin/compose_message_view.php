<?php $this->load->view('cityadmin/profile_menu') ?>

<!--Content Part Start-->

<div class="main-content container">
  <div class="row">
    <?php $this->load->view('cityadmin/profile_left') ?>
    <div class="right-part col-xs-12 col-sm-8 col-md-8" >
      <div class="white-bg">
        <h2 class="text-center title page-title border-bottom">Compose Message</h2>
        <form id="partnerform" class="message-form" name="replyform" >
          <div class="row">
              <div class="input-row">
                <div>{{message}}</div>
                <label class="col-xs-12 col-sm-4 col-md-3"> Select Receiver </label>
                <span class="col-xs-12 col-sm-8 col-md-9">
                <select class="form-control" name="reciver" data-ng-model="msg.reciver_id" required>
                  <option value="">--Select Receiver--</option>
                  <?php foreach ($users as $users){
                  echo "<option value='$users->u_id'>$users->comp_person_name</option>";}?>
                </select>
                <div ng-show="replyform.$submitted || replyform.reciver.$touched"> <span ng-show="replyform.reciver.$error.required && replyform.reciver.$dirty">Please Select One Receiver..</span> </div>
                </span> </div>
          </div>
          <div class="row">
            <div class="input-row">
              <label class="col-xs-12 col-sm-4 col-md-3"> Subject </label>
              <span class="col-xs-12 col-sm-8 col-md-9">
                <input class="form-control" name="subject" data-ng-model="msg.subject" value="" required>
                <div ng-show="replyform.$submitted || replyform.subject.$touched"> <span ng-show="replyform.subject.$error.required && replyform.subject.$dirty">Please Enter Some words..</span> </div>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="input-row">
             
                <label class="col-xs-12 col-sm-4 col-md-3"> Message </label>
                <div class="col-xs-12 col-sm-9 col-md-9">
                  <div class="comment-area float-n">
                    <textarea alt="comment" name="comment" data-ng-model="msg.mssg"  required placeholder="Message..." class="comment form-control"></textarea>
                  </div>
                  <div ng-show="replyform.$submitted || replyform.comment.$touched"> <span ng-show="replyform.comment.$error.required && replyform.comment.$dirty">Please Enter Some words..</span> </div>
                  <div class="submit-button top_space">
                  <input ng-disabled="replyform.$invalid" ng-click="send_msg(msg)" type="submit" class="btn btn-default" value="Send">
                </div>
                </div>
             
           	</div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Content Part End--> 

