<div id="page-content">
  <div id='wrap'>
    <div id="page-heading">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url() . 'admin/users'; ?>">Dashboad</a></li>
        <li>Users</li>
        <li class="active">Users</li>
      </ul>
      <h1>Users</h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-sky">
            <div class="panel-heading">
              <h4>Users Data</h4>
              <div class="options"> <a href="javascript:;" class="panel-collapse"><i class="icon-chevron-down"></i></a> 
                <!--<a href="<?php echo site_url() . 'admin/worker/add' ?>">Add Users</a>--> 
              </div>
            </div>
            <div class="panel-body collapse in table-wrap">
            	
                  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped datatables" id="example">
                    <thead>
                      <tr>
                        <th>Users Name</th>
                        <th>Email</th>
                        <th>City</th> 
                        <th>Status</th> 
                        <th>response</th>
                      </tr>
                    </thead>
                    <tbody id="list-data">
                      <?php foreach ($users as $users) { ?>
                      <tr class="">
                        <td><!--                                                <a data-toggle="dropdown" class="dropdown-toggle username" href="javascript:;">
                                                        <img src="<?php echo base_url() . 'uploads/profile/' . $users->p_image ?>" alt="" class="img-circle">
                                                    </a>--> 
                          <?php echo $users->comp_person_name ?></td>
                        <td><?php echo $users->u_email ?></td>
                        <td><?php echo $users->city_name ?></td>
                        <td><?php echo ($users->u_status == 0) ? "Inactive" : "Active"; ?></td>
                        <td class="center worker-btn"><?php  if($users->u_status == 0){?>
                          <a  class='btn btn-success' href='javascript:;' onclick='approval(<?php echo $users->u_id ?>, 1)'>Accept</a>
                          <?php }else{?>
                          <a  class='btn btn-danger' href='javascript:;' onclick='approval(<?php echo $users->u_id ?>, 0)'>Inactive</a>
                          <?php }?></td>
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
function approval(id, val) {
    var form_data = {
        u_id: id,
        value: val};
    $.ajax({
        url: '<?php echo site_url() . 'admin/users/active'; ?>',
        data: form_data,
        type: 'post',
        datatype: 'json',
        success: function(data) {
            if (data.trim()== "1")
                location.reload();
        }
    });
}

</script>
</html></body>