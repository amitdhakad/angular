<?php $this->load->view('cityadmin/profile_menu') ?>

<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('profile_left') ?>  

        <!--Right Part Start-->
        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg">
                <div class="row" ng-bind-html="message| nl2br"></div>
                <form name="adddeal" novalidate  id="partnerform" ng-show="addfrm">
                    <h2 class="text-center title page-title border-bottom">Add Deal</h2>

                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-3 col-md-3"> Deal Title</label>
                            <span class="col-xs-12 col-sm-9 col-md-9">
                                <input class="form-control" type="text" name="title" data-ng-model="deal.title" required>
                            </span>
                        </div>
                        <div ng-show="adddeal.$submitted || adddeal.title.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                            <span ng-show="adddeal.title.$error.required && adddeal.title.$dirty">Title is Required.</span> 
                        </div>
                    </div>


                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-3 col-md-3">Budget</label>
                            <span class="col-xs-12 col-sm-9 col-md-9">
                                <input class="form-control" type="text" name="budget" data-ng-model="deal.budget" required>
                            </span>
                        </div>
                        <div ng-show="adddeal.$submitted || adddeal.budget.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                            <span ng-show="adddeal.budget.$error.required && adddeal.budget.$dirty">Budget is Required.</span> 
                        </div>
                    </div>
                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-3 col-md-3">Description</label>
                            <span class="col-xs-12 col-sm-9 col-md-9">
                                <!--<textarea class="form-control" name="description" data-ng-model="deal.description" required></textarea>-->
                                <div text-angular=""  data-ng-model="deal.description"></div>
                            </span>
                        </div>
                        <div ng-show="adddeal.$submitted || adddeal.description.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                            <span ng-show="adddeal.description.$error.required && adddeal.description.$dirty">Description is Required.</span> 
                        </div>
                    </div>
                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-3 col-md-3">Document File</label>
                            <span class="col-xs-12 col-sm-9 col-md-9">
                                <div class="submit-button">
                                    <button class="btn btn-default" ng-file-select ng-model="files" ng-multiple="true">Attach Any File</button>
                                </div>
                                <ul style="clear:both" ng-show="files.length > 0" class="response">
                                    <li class="sel-file" ng-repeat="f in files">                    
                                        <span class="progress" ng-show="f.progress >= 0">						
                                            <div style="width:{{f.progress}}%">{{f.progress}}%</div>
                                        </span>                     
                                    </li>
                                </ul>
                            </span>
                        </div>                        
                    </div>

                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-3 col-md-3">Search Key-Word</label>
                            <span class="col-xs-12 col-sm-9 col-md-9">
                                <input type="text" class="form-control" name="search_keyword" data-ng-model="deal.search_keyword" required></textarea>
                            </span>
                        </div>
                        <div ng-show="adddeal.$submitted || adddeal.search_keyword.$touched" class="col-md-offset-3 col-sm-offset-3 ng-hide"> 
                            <span ng-show="adddeal.search_keyword.$error.required && adddeal.search_keyword.$dirty">Search Key-Word is Required.</span> 
                        </div>
                    </div>
                    <div class="row">        
                        <div class="input-row">
                            <label class="col-xs-12 col-sm-3 col-md-3">Assign To</label>
                            <span class="col-xs-12 col-sm-9 col-md-9">                          
                                <!--<input type="text" name="assign_to" data-ng-model="deal.assign_to" placeholder="Assign to" typeahead="user.name for user in users  | filter:$viewValue" class="form-control">-->
                                <select class="form-control" setSeletected="0" data-ng-model="deal.assign_to" required>
                                    <option value="0">Public</option>
                                    <?php
                                    foreach ($users as $users) {
                                        echo "<option value='$users->u_id'>$users->comp_person_name</option>";
                                    }
                                    ?>
                                </select>
                            </span>

                        </div>                        
                    </div>

                    <div class="row">
                        <label class="col-xs-12 col-sm-3 col-md-3"></label>
                        <div class="col-md-9">
                            <div class="submit-button">
                                <input class="btn btn-default" ng-disabled="adddeal.$invalid" ng-click="add_deal(deal)" type="submit" value="Submit" id="submitbutton">
                                <input type="button" class="btn btn-default" value="Cancel" ng-click="addfrm=!addfrm">
                            </div>
                        </div>
                    </div>

                </form>




                <!-- Your Deal Section -->
                <div ng-show="!addfrm">
                    <h2 ng-show="!addfrm" class="text-center title page-title border-bottom">{{title}}</h2>
                    <div ng-show="!addfrm" class="submit-button add_deal_btn">
                        <button class="btn btn-default" ng-click="addfrm=!addfrm">Add Deal</button>
                    </div>
                    <div ng-show='!deals.length' class="row" > 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label class="col-xs-12 col-sm-6 col-md-6"> 
                            No Deals Available !!
                        </label>
                    </div>
                </div>


                    <div ng-show='deals.length' class="row" >                            
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    	<div class="searchdeal_wrapper">
                            <div class="searchdeal">
                                <label class="search-title">Serach</label>
                                <div class="search-input">
                                    <input  ng-model="search" id="search" class="form-control" placeholder="Filter text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div  dir-paginate="deal in deals | filter:search | itemsPerPage: pageSize" current-page="currentPage">

                        <div class="row" >
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="user-image-sm col-xs-12 col-sm-2 col-md-2"> 
                                    <img class="img-circle" src="{{deal.comp_person_image}}" alt="" title="" /> 
                                </div>
                                <div class="col-xs-12 col-sm-10 col-md-10">
                                    <div class="comment-content">
                                        <div class="row">
                                            <div class="top col-xs-12 col-sm-12 col-md-12">
                                                <div class="left">
                                                    <h4 class="comment-user-name">{{deal.comp_person_name}}</h4>
                                                    <span class="update-time">{{deal.date* 1000 | date:'medium'}}</span>  
                                                </div>      
                                                <div class="right"> Status/{{deal.status =="1"  ? 'Active' : 'Inactive'}} </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="comment-detail col-xs-12 col-sm-12 col-md-12">
                                                <span class="hide">{{deal.search_keyword}}</span>
                                                <h2 class="comment-title">
                                                    <a href="#/your_deal/{{deal.slug}}">{{deal.title}}</a>
                                                </h2>
                                                <p>
                                                    {{deal.description | htmlToPlaintext | strLimit: 200}} 
                                                </p>
                                                <ul class="comment-counting">
                                                    <li class="first">Budget</li>
                                                    <li class="last">{{deal.budget}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>                    
                    </div>
                    <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?php echo base_url() . 'assets/frontcss/js/dirPagination.tpl.html' ?>"></dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Content Part End-->