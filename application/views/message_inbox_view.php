<?php $this->load->view('profile_menu') ?>
<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('profile_left') ?>  

        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg maeesage-wrapper">
                <h2 class="text-center title page-title border-bottom">{{title}}</h2>
                
                 <div ng-show='!message.length' class="row" > 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label class="col-xs-12 col-sm-6 col-md-6"> 
                            No Messages Available !!
                        </label>
                    </div>
                </div>

                <div class="table-wrap">
                    <table ng-if="message.length" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped datatables" >
                        <thead>
                            <tr>
                                <td>Search</td>
                                <td><input ng-model="search" id="search" class="form-control" placeholder="Filter text"></td>
                                <td colspan="2">items per page:</td>
                                <td> <input type="number" min="1" max="100" class="form-control" ng-model="pageSize"></td>
                            </tr>

                            <tr>
                                <th>{{type}} Name</th>                            
                                <th>Subject</th>                            
                                <th>Message</th>                            
                                <th>Deal Title</th>                            
                                <th>date</th>
                            </tr>
                        </thead>

                        <tbody id="list-data" dir-paginate="messages in message | filter:search | itemsPerPage: pageSize" current-page="currentPage">                        
                            <tr class="">
                                <td><a href="#/details/{{messages.msg_id}}/{{type}}"> {{messages.name}}</a></td>                                
                                <td>{{messages.subject | htmlToPlaintext }}</td>
                                <td>{{messages.message | htmlToPlaintext | strLimit:20 }}</td>
                                <td>{{messages.title }}</td>
                                <td>{{messages.date* 1000 | date:'medium'}}</td>                                
                            </tr> 

                        </tbody>

                    </table>
                </div>
                <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?php echo base_url() . 'assets/frontcss/js/dirPagination.tpl.html' ?>"></dir-pagination-controls>

            </div>
        </div>
    </div>
</div>

