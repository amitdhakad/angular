<?php $this->load->view('cityadmin/profile_menu') ?>
<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('cityadmin/profile_left') ?>  

        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg">
                <h2 class="text-center title page-title border-bottom ">User List</h2>

                <?php if ($users) { ?>
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
                                        <?php echo $users->comp_person_name ?>
                                    </td>

                                    <td><?php echo $users->u_email ?></td>
                                    <td><?php echo $users->city_name ?></td>
                                    <td><?php echo ($users->u_status == 0) ? "Inactive" : "Active"; ?></td>

                                    <td class="center worker-btn">
                                        <?php if ($users->u_status == '0') { ?>
                                            <a  class='btn btn-success' href='javascript:;' ng-click='approval(<?php echo $users->u_id ?>,1)'>Active</a>
                                        <?php } else { ?>
                                            <a  class='btn btn-danger' href='javascript:;' ng-click='approval(<?php echo $users->u_id ?>,0)'>Inactive</a>
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php }
                            ?>


                        </tbody>
                    </table>
                <?php } else { ?>

                    <div class="row" > 
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label class="col-xs-12 col-sm-6 col-md-6"> 
                                No Deals Available !!
                            </label>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>

