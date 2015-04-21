 
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'admin/users'; ?>">Dashboad</a></li>
                <li>Deals</li>
                <li class="active">Edit Deals Form</li>
            </ul>
            <h1>Edit Deals</h1>
        </div>
        <div class="container">
            <?php if (isset($success)) { ?>
                <div class="alert alert-dismissable alert-success">
                    <strong>Well done!</strong> Data Successfully Updated.
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading">
                            <h4> <ul class="nav nav-tabs">
                                    <li class="active"><a href="#edit_deal" data-toggle="tab">Edit Deals</a></li>
                                    <li><a href="#replay_deal" data-toggle="tab">Reply</a></li>


                                </ul> </h4>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">

                                <!-- Its Deal Edit Tab-->  
                                <div class="tab-pane active" id="edit_deal">
                                    <?php
                                    $attr = array('class' => 'form-horizontal row-border', 'id' => 'validate-form', 'data-validate' => 'parsley');
                                    echo form_open_multipart("", $attr);
                                    ?>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Deal Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="p_fname" name="title" placeholder="Deals Title " required="required" class="form-control"  value="<?php echo set_value("title", $deals->title); ?>" />
                                            <?php echo form_error("title"); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Budget</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="p_fname" name="budget" value="<?php echo set_value("budget", $deals->budget); ?>" placeholder="Deals Budget" required="required" class="form-control" />
                                            <?php echo form_error("budget"); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="description" id="" cols="80" rows="20" class="ckeditor"><?php echo set_value("description", $deals->description); ?></textarea>

                                            <?php echo form_error("budget"); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Document File</label>
                                        <div class="col-sm-6">
                                            <?php 
                                             $where =array('deal_id' => $this->uri->segment('4'));
                                              $files = ($this->user_model->get_sql_select_data('deal_files', $where));
                                            
                                            if ($files) { ?>
                                                <span class="file-name">
                                                    <?php foreach ($files as $file) { ?>                                                       
                                                    <span id="<?php echo $file->id ?>"><a  class="fancybox button-file" href="<?php echo base_url() . 'uploads/' . $file->file_name; ?>" target="blank"><?php echo $file->file_name ?></a> <span onclick="removefile(<?php echo $file->id ?>)">remove</span></span>
                                                    <br>
                                                    <?php } ?>

                                                </span>                                                  
                                            <?php } ?>
                                            <input type="file" multiple=""  name="userfile[]" class="form-control" />
                                            <span class="text-danger">(Notes : upload only gif, jpg, jpeg, png and pdf)</span>
                                            <?php echo (@$error) ? @$error : ''; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Search Key-Word</label>
                                        <div class="col-sm-6">
                                            <input id="e12" style="width:100%" type="text" name="search_keyword" value="<?php echo set_value("search_keyword", $deals->search_keyword); ?>" placeholder="Search Key-Word" required="required" />
                                            <?php echo form_error("search_keyword"); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Assign To </label>
                                        <div class="col-sm-6">
                                            <select name="assign_to" id="e1"  class="populate" style="width:100%" required="required">
                                                <option value="0">Publicly</option>
                                                <?php
                                                $users = $this->user_model->user_details(array('u_group !=' => 1), 'comp_person_name Asc');
                                                foreach ($users as $users) {
                                                    $city = '';
                                                    if ($users->u_group == 2)
                                                        $city = '[city admin (' . $users->city_name . ')]';

                                                    $data = ($deals->assign_to == $users->u_id ) ? 'selected=""' : '';

                                                    echo "<option " . $data . " value='$users->u_id'>$users->comp_person_name  $city </option>";
                                                }
                                                ?>
                                            </select>
                                            <?php echo form_error("search_keyword"); ?>
                                        </div>
                                    </div>


                                    <!--                                    <div class="form-group">
                                                                            <label class="col-sm-3 control-label">Status</label>
                                                                            <div class="col-sm-6">
                                                                                <label class="radio-inline">
                                                                                    <input type="radio" <?php echo ($deals->status == 1) ? "checked" : ""; ?> value="1" name="status">
                                                                                    Active
                                                                                </label>
                                                                                <label class="radio-inline">
                                                                                    <input type="radio" <?php echo ($deals->status == 0) ? "checked" : ''; ?> value="0" name="status">
                                                                                    InActive
                                                                                </label>
                                    
                                                                            </div>
                                                                        </div>-->


                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
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

                                <!-- Its Deal Reply Tab--> 
                                <div class="tab-pane" id="replay_deal">
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
                                                        $column_resp = array('date', 'query_id', 'response', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image');
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
                                                                    <p><b><?php echo $resp->name; ?></b><span class="pull-right"> <?php echo timeAgo($resp->date); ?></span></p>
                                                                    <?php echo nl2br($resp->response); ?>
                                                                    <!--<p><span> <?php //echo timeAgo($resp->r_date);        ?></span></p>-->
                                                                </div>  
                                                            </div> 

                                                            <?
                                                        }

                                                        if ($data)
                                                            echo '</div>';
                                                        ?>

                                                        <div id="new_reply_ans_<?php echo $query->query_id ?>"></div>
                                                        <p class="reply_btn" onclick="reply_div(<?php echo $query->query_id ?>)">Reply</p>

                                                        <div class="reply_textarea hidden" id="reply_textar_<?php echo $query->query_id ?>">
                                                            <div class="left_content">
                                                                <?php $img = $this->user_model->get_sql_select_data('user_profile', array('p_u_id' => $this->session->userdata('u_id')), array('comp_person_image'), '1'); ?>
                                                                <img class="img-circle reply_img img-thumbnail" src="<?php echo $img[0]->comp_person_image; ?>" />
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

                                    <!-- the input fields that will hold the variables we will use -->
                                    <?php if ($query) { ?>
                                        <input type='hidden' id='query_current_page' />
                                        <input type='hidden' id='query_show_per_page' />
                                        <div class="col-xs-6 pull-right">
                                            <div id="query_page_navigation" class="pull-right"></div>
                                        </div>
                                        <?php
                                    } else {
                                        echo 'No records found';
                                    }
                                    ?>
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
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/comman_ajax.js'></script>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/js/jquery.fancybox.js'></script>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/css/jquery.fancybox.css' media="screen" />

<script>
var site_url = "<?php echo site_url() . 'admin/deals/'; ?>";
function pdf(name) {
    $.fancybox({
        type: 'html',
        autoSize: false,
        content: '<embed src="<?php echo base_url(); ?>uploads/' + name + '#nameddest=self&page=1&view=FitH,0&zoom=80,0,0" type="application/pdf" height="99%" width="100%" />',
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


function removefile(fileid) {
    if (confirm("Do you want Remove this file")) {
        var form_data = { fileid: fileid };
        $.ajax({
            url: '<?php echo site_url() . 'admin/deals/removefile'; ?>',
            data: form_data,
            type: 'post',
            datatype: 'json',
            success: function(data) {
                $("#"+fileid).remove();
            }
        });
    }

}


</script>

</html>
</body>