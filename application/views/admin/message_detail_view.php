<div id="page-content">
    <div id='wrap'>

        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'admin/deal'; ?>">Dashboad</a></li>
                <li>Message</li>
                <li class="active">Message Detail</li>
            </ul>
            <h1>Message Detail</h1>

        </div>
        <div class="container">          
            <div class="row">
                <div class="col-xs-12">
                      <div class="panel panel-sky">
                        <div class="panel-heading"><h4>Message Details</h4></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo $type." Name" ?></label>
                                <div class="col-sm-6">
                                    <?php echo $msg->name; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Deal Title</label>
                                <div class="col-sm-6">
                                    <?php echo $msg->title ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Message</label>
                                <div class="col-sm-6">
                                    <?php echo $msg->message ?>
                                </div>
                            </div>     
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-6">
                                   <?php echo timeAgo($msg->date) ?>
                                </div>
                            </div>     
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
<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/jquery.fancybox.js'></script>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/css/jquery.fancybox.css' media="screen" />

<script>
function pdf(name){
$.fancybox({ 
        type: 'html',
        autoSize: false,
        content: '<embed src="<?php echo base_url();?>uploads/'+name+'#nameddest=self&page=1&view=FitH,0&zoom=80,0,0" type="application/pdf" height="99%" width="100%" />',
      beforeClose: function() {
        $(".fancybox-inner").unwrap();
        },
      helpers: {
            overlay: {
            opacity: 0.3
             } // overlay
         }
    });
}

</script>

</html>
</body>