<div id="page-content">
    <div id='wrap'>

        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'admin/users'; ?>">Dashboad</a></li>
                <li>Deals</li>
                <li class="active">Details Deals</li>
            </ul>

            <h1>Details Deals</h1>

        </div>
        <div class="container">          
            <div class="row">
                <div class="col-xs-12">
                      <div class="panel panel-sky">
                        <div class="panel-heading"><h4>Deals Details</h4></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Deal Title</label>
                                <div class="col-sm-6">
                                    <?php echo $deals->title; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Budget</label>
                                <div class="col-sm-6">
                                    <?php echo $deals->budget ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-6">
                                    <?php echo $deals->description ?>
                                </div>
                            </div>
                            
                             <?php if($deals->doc_file){ ?>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">Document File</label>
                                <div class="col-sm-6">
                                   
                                    <span class="file-name" ><?php echo $deals->doc_file ?></span>  <a  class="fancybox button-file" href="javascript:;" onclick="pdf('<?php echo $deals->doc_file ?>')">Preview</a>
                                    
                                    
                                </div>
                            </div>
                            <?php }?>
                                                       
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Assign To </label>
                                <div class="col-sm-6">
                                  
                                        <?php $users= array_shift($this->user_model->user_details(array('u_id !='=>$deals->assign_to))); 
                                             echo $users->comp_person_name;
                                              if($users->u_group==2)
                                                 echo    $city='[city admin ('.$users->city_name.')]';                                        
                                         ?>
                                    
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-6">
                                    <label class="radio-inline">
                                        <?php echo ($deals->status == 1) ? "Active" : "InActive"; ?>
                                        
                                    </label>
                                   
                                     
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