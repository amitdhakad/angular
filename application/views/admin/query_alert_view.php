<?php $site_url = site_url() . 'admin/deals/'; ?>
<div id="page-content">
    <div id='wrap'>

        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo $site_url; ?>">Dashboad</a></li>
                <li><a href="<?php echo $site_url . 'details/'.$query[0]->deal_id; ?>">Deal</a></li>
                <li class="active">Query Alert</li>
            </ul>

            <h1>Query Alert</h1>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="panel panel-sky">
                        <div class="panel-heading">
                            <h4>Query</h4>
                            <div class="options">   
                                <a href="javascript:;" class="panel-collapse"><i class="icon-chevron-down"></i></a>
                            </div>
                        </div>

                        <div class="panel-body collapse in">
                            <div class="tab-content">

                               <!-- Its Query Tab-->
                               <h1>Query</h1>
                                    <div class="row_content" id="query_content">
                                        <?php foreach ($query as $query) { ?>
                                            <div class="main_content">
                                            <div class="query_content">
                                                <p>Posted by <b><?php echo $query->name; ?></b>
                                                    <span> <?php echo timeAgo($query->date); ?></span></p>
                                                <div class="left_content">
                                                    <img class="img-circle img-thumbnail" src="<?php echo $query->comp_person_image; ?>" />
                                                </div>
                                                <div class="right_content"><?php echo nl2br($query->query); ?></div>
                                                </div>

                                                <div class="reply_content">
                                                    <div class="reply_discussion" id="reply_discussion_<?php echo $query->query_id ?>">


                                                        <?php
                                                        $joins_query_resp = array(array('table' => 'user_profile',
                                                                                        'condition' => 'query_response.user_id=user_profile.p_u_id',
                                                                                        'jointype' => 'inner'));
                                                        $where_resp = array('query_id' => $query->query_id);
                                                        $column_resp = array('date', 'query_id', 'response', 'concat(comp_person_gender,comp_person_name) as name','comp_person_image');
                                                        $data = $this->user_model->get_joins('query_response', $where_resp, $joins_query_resp, $column_resp, NULL, NULL, 'response_id  ASC');
                                                        if ($data)
                                                            echo ' <p class="discussion-text">Discuss this message</p> <div class="reply_wrap_content">';
                                                        foreach ($data as $resp) {
                                                           
                                                            ?>
                                                            <div class="reply_ans">
                                                                <div class="left_content">
                                                                    <img class="img-circle reply_img img-thumbnail" src="<?php echo $resp->comp_person_image; ?>" />
                                                                </div>
                                                                <div class="right_content">
                                                                    <p><b><?php echo $resp->name ; ?></b><span class="pull-right"> <?php echo timeAgo($resp->date); ?></span></p>
                                                                    <?php echo nl2br($resp->response); ?>
                                                                    <!--<p><span> <?php //echo timeAgo($resp->r_date); ?></span></p>-->
                                                                </div>  
                                                            </div> 

                                                        <? } 
                                                        
                                                        if ($data) echo '</div>';
                                                        ?>
                                                        
                                                        <div id="new_reply_ans_<?php echo $query->query_id ?>"></div>
                                                        <p class="reply_btn" onclick="reply_div(<?php echo $query->query_id ?>)">Reply</p>

                                                        <div class="reply_textarea hidden" id="reply_textar_<?php echo $query->query_id ?>">
                                                            <div class="left_content">
                                                                
                                                               <?php  $img=  array_shift($this->user_model->get_sql_select_data('user_profile', array('p_u_id' => $this->session->userdata('u_id')),array('comp_person_image'), '1')); ?>
                                                                <img class="img-circle reply_img img-thumbnail" src="<?php echo $img->comp_person_image; ?>" />
                                                            </div>
                                                            <div class="right_content">
                                                                <textarea name="" id="reply_text_value_<?php echo $query->query_id ?>" class="form-control autosize reply_text_value"></textarea>
                                                                <p></p>
                                                                <input class="btn-success btn pull-right" type="submit" value="Submit" onclick="query_reply(<?php echo $query->query_id ?>)" />
                                                            </div> 
                                                           
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                     <?php } ?>
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
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/demo-datatables.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/placeholdr.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/application.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/demo.js'></script> 

<script type="text/javascript">
 var site_url="<?php echo $site_url ?>";   
$(document).ready(function() {
    
    /*---Its function use to New Line------*/
    textarea = $('.reply_text_value');
    textarea.keyup(insertNewlines);
});

</script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/comman_ajax.js'></script>


</html>
</body>