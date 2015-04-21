<?php $this->load->view('cityadmin/profile_menu') ?>

<!--Content Part Start-->
<div class="main-content container">
    <div class="row">         
        <?php $this->load->view('cityadmin/profile_left') ?>  
        <div class="right-part col-xs-12 col-sm-8 col-md-8" >
            <div class="white-bg">
                <h2 class="text-center title page-title border-bottom ">{{title}}</h2>
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
                

                <div dir-paginate="deal in deals | filter:search | itemsPerPage: pageSize" current-page="currentPage">

                    <div class="row" >
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="user-image-sm col-xs-3 col-sm-3 col-md-3"> 
                                <img class="img-circle" src="{{deal.comp_person_image}}" alt="" title="" /> 
                            </div>
                            <div class="col-xs-9 col-sm-9 col-md-9">
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
                                                <a href="#/deals/{{deal.slug}}">{{deal.title}}</a>
                                            </h2>
                                            <p>
                                                {{deal.description | htmlToPlaintext | strLimit: 200}} 
                                            </p>
                                            <ul class="comment-counting">
                                                <li class="first">Budget</li>
                                                <li class="last">{{deal.budget}}</li>

                                                <!--<li class="first"><button ng-click="replyform = !replyform">Reply</button></li>-->
                                                <!--<li class="first"><button ng-click="mesgform = !mesgform">Message</button></li>-->
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
<!--Content Part End-->