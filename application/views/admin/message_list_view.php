<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url() . 'admin/deals'; ?>">Dashboad</a></li>
                <li>Message</li>
                <li class="active">Message</li>
            </ul>

            <h1>Messages</h1>

        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-sky">
                        <div class="panel-heading">
                            <h4>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#inbox" data-toggle="tab">Inbox</a></li>
                                    <li><a href="#sent" data-toggle="tab">Sent</a></li>
                                </ul>
                            </h4>
                            <div class="options">
                                <a href="javascript:;" class="panel-collapse"><i class="icon-chevron-down"></i></a>

                            </div>
                        </div>
                        <div class="panel-body collapse in">
                            <div class="tab-content">

                                <div class="tab-pane active" id="inbox">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped datatables" >
                                        <thead>
                                            <tr>
                                                <th>Sender Name</th>                            
                                                <th>Message</th>                            
                                                <th>Deal Title</th>                            
                                                <th>Time </th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-data">
                                            <?php foreach ($inbox as $inbox) { ?>
                                                <tr class="">
                                                    <td><a href="<?php echo site_url() . 'admin/message/details/' . $inbox->msg_id.'/recive'; ?>"><?php echo $inbox->name ?></a></td>                                
                                                    <td><?php echo word_limiter($inbox->message,10) ?></td>
                                                    <td><?php echo $inbox->title ?></td>
                                                    <td><?php echo timeAgo($inbox->date) ?></td>                                
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="tab-pane" id="sent">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped datatables" id="example">
                                        <thead>
                                            <tr>
                                                <th>Reciver Name</th>                            
                                                <th>Message</th>                            
                                                <th>Deal Title</th>                            
                                                <th>Time </th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-data">
                                            <?php foreach ($sent as $sent) { ?>
                                                <tr class="">
                                                    <td><a href="<?php echo site_url() . 'admin/message/details/' . $sent->msg_id.'/sent'; ?>"><?php echo $sent->name ?></a></td>                                
                                                    <td><?php echo $sent->message ?></td>
                                                    <td><?php echo $sent->title ?></td>
                                                    <td><?php echo timeAgo($sent->date) ?></td>                                
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
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
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/demo-datatables.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/placeholdr.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/application.js'></script> 
<script type='text/javascript' src='<?php echo base_url(); ?>assets/demo/demo.js'></script> 
<script>
    $(function() {
        /*----its using for first column show Desc Order*/
        var oTable = $('#example').dataTable();
        oTable.fnSort([[0, 'desc']]);
    });// This function use to first column show to descnding order


    function active(id, val) {
        var form_data = {
            d_id: id,
            value: val};
        $.ajax({
            url: '<?php echo site_url() . 'admin/messahe/delete'; ?>',
            data: form_data,
            type: 'post',
            datatype: 'json',
            success: function(data) {
                if (data.trim() == "1")
                    location.reload();
            }
        });
    }

</script>
</html>
</body>