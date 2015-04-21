 
<div id="page-content">
    <div id='wrap'>

        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url().'admin/order'; ?>">Dashboad</a></li>
                <li>Worker</li>
                <li class="active">Add Worker Form</li>
            </ul>

            <h1>Add Worker</h1>

        </div>
        <div class="container">
           <?php if (isset($success)) { ?>
                <div class="alert alert-dismissable alert-success">
                    <strong>Well done!</strong> Data Successfully Inserted.
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading"><h4>Add Worker </h4></div>
                        <div class="panel-body">
                            <?php
                            $attr = array('class' => 'form-horizontal row-border', 'id' => 'validate-form', 'data-validate' => 'parsley');
                            echo form_open_multipart("", $attr);
                            ?>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">First Name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="p_fname" name="user_profile[p_fname]" placeholder="Worker First name" required="required" class="form-control"  value="<?php echo set_value("user_profile[p_fname]"); ?>" />
                                    <?php echo form_error("user_profile[p_fname]"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Last Name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="p_fname" name="user_profile[p_lname]" value="<?php echo set_value("user_profile[p_lname]"); ?>" placeholder="Worker Last Name" required="required" class="form-control" />
                                    <?php echo form_error("user_profile[p_lname]"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-6">

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_profile[p_gender]" <?php if (set_value("user_profile[p_gender]") == 'male') echo "checked='checked' "; ?>  value="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_profile[p_gender]" <?php if (set_value("user_profile[p_gender]") == 'female') echo "checked='checked'"; ?>  value="female">
                                            Female

                                        </label>
                                    </div>

                                    <?php echo form_error("user_profile[p_gender]"); ?>          

                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" id="u_username" name="users[u_username]" value="<?php echo set_value("users[u_username]"); ?>" placeholder="Worker Username" required="required" class="form-control" />
                                     <?php echo form_error("users[u_username]"); ?>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                   <input type="text" id="u_email" name="users[u_email]" placeholder="Worker Email Address" required="required" class="form-control" value="<?php echo set_value("users[u_email]"); ?>" />
                                   <?php echo form_error("users[u_email]"); ?>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Image</label>
                                <div class="col-sm-6">
                                   <input type="file" id="userfile" name="userfile" value="" />
                                    <?php if (!empty($error)) echo '<span class="text-danger">'.$error.'</span>' ?>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" data-minlength="6" id="password" placeholder="******" required="required" class="form-control" name="password" value="<?php echo set_value("password"); ?>" />
                                            <?php echo form_error("password"); ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-6">
                                   <input type="password" data-minlength="6" id="u_password" placeholder="*****" required="required" class="form-control" name="users[u_password]" value="<?php echo set_value("users[u_password]"); ?>" />
                                            <?php echo form_error("users[u_password]"); ?>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="btn-toolbar">
                                            <input class="btn-success btn" type="submit" value="Submit" onclick="javascript:$('#validate-form').parsley('validate');" />
                                            <button type="reset" class="btn-default btn">Reset</button>
                                            <a class="btn-default btn" href="<?php echo site_url().'admin/worker' ?>">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div> <!-- container -->
    </div> <!--wrap -->
</div> <!-- page-content -->


<!-- Footer Contained -->
<?php echo $this->load->view('template/footer_admin');?> 

<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jqueryui-1.10.3.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/bootstrap.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/enquire.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.cookie.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.touchSwipe.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.nicescroll.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/codeprettifier/prettify.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/easypiechart/jquery.easypiechart.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/sparklines/jquery.sparklines.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-toggle/toggle.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-parsley/parsley.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/demo-formvalidation.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-multiselect/js/jquery.multi-select.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/quicksearch/jquery.quicksearch.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-typeahead/typeahead.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-select2/select2.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-autosize/jquery.autosize-min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-ckeditor/ckeditor.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-colorpicker/js/bootstrap-colorpicker.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/jqueryui-timepicker/jquery.ui.timepicker.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-daterangepicker/daterangepicker.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/form-daterangepicker/moment.min.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/demo-formcomponents.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/placeholdr.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/application.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/demo.js'></script>

</html>
</body>