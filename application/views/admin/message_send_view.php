
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'admin/deal'; ?>">Dashboad</a></li>
                <li>Message</li>
                <li class="active">Send Message Form</li>
            </ul>
            <h1>Send Message</h1>
        </div>
        <div class="container">
            <?php if (isset($success)) { ?>
                <div class="alert alert-dismissable alert-success"> <strong>Well done!</strong> Data Successfully Inserted.
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading">
                            <h4>Send Message </h4>
                        </div>
                        <div class="panel-body">
                            <?php
                            $attr = array('class' => 'form-horizontal row-border', 'id' => 'validate-form', 'data-validate' => 'parsley');
                            echo form_open_multipart("", $attr);
                            ?>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Select Receiver</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <select id="e1" name="reciver_id" required="required" style="width:100%">
                                        <option value="">--Select Receiver--</option>
                                        <?php
                                        foreach ($users as $users) {

                                            echo "<option value='$users->u_id'>$users->name</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error("receiver"); ?> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-3 control-label">Message</label>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <textarea name="message" id="" cols="80" rows="20" class="ckeditor form-control"></textarea>
                                    <?php echo form_error("message"); ?> </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-sm-offset-3">
                                        <div class="btn-toolbar">
                                            <input class="btn-success btn" type="submit" value="Submit" onclick="javascript:$('#validate-form').parsley('validate');" />
                                            <button type="reset" class="btn-default btn">Reset</button>
                                            <a class="btn-default btn" href="<?php echo site_url() . 'admin/message' ?>">Cancel</a> </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container --> 
    </div>
    <!--wrap --> 
</div>
<!-- page-content --> 

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
</html></body>