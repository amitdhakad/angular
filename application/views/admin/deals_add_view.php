 
<div id="page-content">
    <div id='wrap'>

        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'admin/users'; ?>">Dashboad</a></li>
                <li>Deals</li>
                <li class="active">Add Deals Form</li>
            </ul>

            <h1>Add Deals</h1>

        </div>
        <div class="container">
            <?php if (isset($success)) { ?>
                <div class="alert alert-dismissable alert-success">
                    <strong>Well done!</strong> Data Successfully Inserted.
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading"><h4>Add Deals </h4></div>
                        <div class="panel-body">
                            <?php
                            $attr = array('class' => 'form-horizontal row-border', 'id' => 'validate-form', 'data-validate' => 'parsley');
                            echo form_open_multipart("", $attr);
                            ?>


                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Deal Title</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <input type="text" id="p_fname" name="title" placeholder="Deals Title " required="required" class="form-control"  value="<?php echo set_value("title"); ?>" />
                                    <?php echo form_error("title"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Budget</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <input type="text" id="p_fname" name="budget" value="<?php echo set_value("budget"); ?>" placeholder="Deals Budget" required="required" class="form-control" />
                                    <?php echo form_error("budget"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Description</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <textarea name="description" id="" cols="80" rows="20" class="ckeditor"></textarea>

                                    <?php echo form_error("budget"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Document File</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <input type="file" multiple="" name="userfile[]"  class="form-control" />
                                    <span class="text-danger">(Notes : upload only gif, jpg, jpeg, png and pdf )</span>
                                    <?php echo (@$error) ? @$error : ''; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Search Key-Word</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <input  id="e12" style="width:100%" type="text" name="search_keyword" value="<?php echo set_value("search_keyword"); ?>" placeholder="Search Key-Word" required="required" />
                                    <?php echo form_error("search_keyword"); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Assign To </label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <select id="e1" name="assign_to" required="required" style="width:100%">
                                        <option value="0">Publicly</option>
                                        <?php
                                        $users = $this->user_model->user_details(array('u_group !=' => 1, 'u_status' => '1'), 'comp_person_name Asc');
                                        foreach ($users as $users) {
                                            $city = '';
                                            if ($users->u_group == 2)
                                                $city = '[city admin (' . $users->city_name . ')]';

                                            echo "<option value='$users->u_id'>$users->comp_person_name  $city </option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error("search_keyword"); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Status</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="radio-inline">
                                        <input type="radio" checked="checked" value="1" name="status">
                                        Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="0" name="status">
                                        InActive
                                    </label>

                                </div>
                            </div>


                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3">
                                        <div class="btn-toolbar">
                                            <input class="btn-success btn" type="submit" value="Submit" onclick="javascript:$('#validate-form').parsley('validate');" />
                                            <button type="reset" class="btn-default btn">Reset</button>
                                            <a class="btn-default btn" href="<?php echo site_url() . 'admin/worker' ?>">Cancel</a>
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
<?php echo $this->load->view('template/footer_admin'); ?> 

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