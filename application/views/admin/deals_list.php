<div id="page-content">
  <div id='wrap'>
    <div id="page-heading">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url() . 'admin/deals'; ?>">Dashboad</a></li>
        <li>Deals</li>
        <li class="active">Deals</li>
      </ul>
      <h1>Deals</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-sky">
            <div class="panel-heading">
              <h4>Deals Data</h4>
              <div class="options"> <a href="javascript:;" class="panel-collapse"><i class="icon-chevron-down"></i></a> <a href="<?php echo site_url() . 'admin/deals/add' ?>">Add Deals</a> </div>
            </div>
            <div class="panel-body collapse in">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped datatables" id="example">
                <thead>
                  <tr>
                    <th>Deals No</th>
                    <th>Deals Title</th>
                    <th>Deals Admin</th>
                    <th>Budget</th>
                    <th>Assign To</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="list-data">
                  <?php foreach ($deals as $deals) { ?>
                  <tr class="<?php if($deals->p_u_id==$this->session->userdata('u_id')) echo 'sup-admin-row'; ?>">
                    <td><?php echo $deals->id . $deals->date ?></td>
                    <td class="deal-title"><a href="<?php echo site_url() . 'admin/deals/edit/' . $deals->id ?>"><?php echo $deals->title ?></a></td>
                    <td><?php 
                                                if($deals->p_u_id==$this->session->userdata('u_id'))
                                                echo '<span class="sup-admin-name">You</span>' ;
                                                else echo $deals->dealadmin ;
                                                    ?></td> 
                    <td><?php echo $deals->budget ?></td>
                    <td><?php
                                                if ($deals->comp_person_name) {
                                                    echo $deals->comp_person_name;
                                                } else {
                                                    echo "Public";
                                                }
                                                ?></td>
                    <td><?php echo ($deals->status == 0) ? "Inactive" : "Active"; ?></td>
                    <td class="center worker-btn"><?php if ($deals->status == 0) { ?>
                      <a  class='btn btn-success' href='javascript:;' onclick='active(<?php echo $deals->id ?>, 1)'>Active</a>
                      <?php } else { ?>
                      <a  class='btn btn-danger' href='javascript:;' onclick='$("#deactive<?php echo $deals->id ?>").toggle()'>Inactive</a> <span id="deactive<?php echo $deals->id ?>" style="display: none">
                      <textarea class="form-control" id='reason<?php echo $deals->id ?>' placeholder="Enter Deactive Reason"></textarea>
                      
                      <button class="btn btn-sm" onclick='active(<?php echo $deals->id ?>, 0)'>submit</button>
                      </span>
                      <?php } ?></td>
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
    if (val == 0) {
        if ($("#reason" + id).val() == '') {
            $("#reason" + id).css('border', '1px solid red');

            return;
        }
    }


    var form_data = {
        d_id: id,
        value: val,
        reason: $("#reason" + id).val()
    };
    $.ajax({
        url: '<?php echo site_url() . 'admin/deals/active'; ?>',
        data: form_data,
        type: 'post',
        datatype: 'json',
        success: function(data) {
            if (val == 0)
                $("#reason" + id).val('');

            if (data.trim() == "1")
                location.reload();
        }
    });
}

</script>
</html></body>