 
<div id="page-content">
    <div id='wrap'>

        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'admin/order'; ?>">Dashboad</a></li>
                <li>edit profile</li>

            </ul>

            <h1>Edit Profile</h1>

        </div>
        <div class="container">
            <?php if (isset($success)) { ?>
                <div class="alert alert-dismissable alert-success">
                    <strong>Well done!</strong> Data Successfully Update.
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading"><h4>Edit</h4></div>
                        <div class="panel-body">
                            <?php
                            $attr = array('class' => 'form-horizontal row-border', 'id' => 'validate-form', 'data-validate' => 'parsley');
                            echo form_open_multipart("admin/order/profile_edit", $attr);
                            ?>



                            <div class="form-group">
                                <label class="col-sm-3 control-label">First Name</label>
                                <div class="col-sm-6">
                                    <?php 
                                    if(set_value("user_profile[p_fname]"))
                                        $p_fname=set_value("user_profile[p_fname]");
                                    else $p_fname=$user_data[0]->p_fname;
                                    ?>                                    
                                    <input type="text" id="p_fname" name="user_profile[p_fname]" placeholder="Worker First name" required="required" class="form-control"  value="<?php echo $p_fname; ?>" />
                                    <?php echo form_error("user_profile[p_fname]"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Last Name</label>
                                <div class="col-sm-6">
                                     <?php 
                                    if(set_value("user_profile[p_lname]"))
                                        $p_lname=set_value("user_profile[p_lname]");
                                    else $p_lname=$user_data[0]->p_lname;
                                    ?>  
                                    
                                    <input type="text" id="p_fname" name="user_profile[p_lname]" value="<?php echo $p_lname; ?>" placeholder="Worker Last Name" required="required" class="form-control" />
                                    <?php echo form_error("user_profile[p_lname]"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-6">

                                    <div class="radio">
                                        
                                         <?php 
                                    if(set_value("user_profile[p_gender]"))
                                        $p_gender=set_value("user_profile[p_gender]");
                                    else $p_gender=$user_data[0]->p_gender;
                                    ?>
                                        
                                        <label>
                                            <input type="radio" name="user_profile[p_gender]" <?php if ($p_gender == 'male') echo "checked='checked' "; ?>  value="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="user_profile[p_gender]" <?php if ($p_gender == 'female') echo "checked='checked'"; ?>  value="female">
                                            Female

                                        </label>
                                    </div>

                                    <?php echo form_error("user_profile[p_gender]"); ?>          

                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-sm-3 control-label">Image</label>
                                <div class="col-sm-6">
                                    <input type="file" id="userfile" name="userfile" value="" />
                                    <img src="<?php echo base_url().'uploads/profile/'.$user_data[0]->p_image; ?>" class="img-thumbnail">
                                    
                                    <?php if (!empty($error)) echo $error ?>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="btn-toolbar">
                                            <input class="btn-success btn" type="submit" value="Submit" onclick="javascript:$('#validate-form').parsley('validate');" />
                                            <a class="btn-default btn" href="<?php echo site_url() . 'admin/order' ?>">Cancel</a>
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
<?php echo $this->load->view('template/footer_worker'); ?> 

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