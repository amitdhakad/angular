var app = angular.module('adamglobal', ['ui.bootstrap','ngFileUpload' , 'ngRoute', 'textAngular', 'angularUtils.directives.dirPagination', 'toaster']);


/*******************
 * filter Functions 
 * ********************/
        //--- User for delete all HTML tags in the string
        app.filter('htmlToPlaintext', function() {
            return function(text) {
                return String(text).replace(/<[^>]+>/gm, '');
            }
        });

        //--- Use For Get short discription
        app.filter('strLimit', ['$filter', function($filter) {
                return function(input, limit) {
                    if (!input)
                        return;
                    if (input.length <= limit) {
                        return input;
                    }
                    return $filter('limitTo')(input, limit) + '...';
                };
            }]);


        //----- Its use for get nl2br String 
        app.filter('nl2br', ['$sce', function($sce) {
                return function(text) {
                    return text ? $sce.trustAsHtml(text.replace(/\n/g, '<br/>')) : '';
                };
            }])

/*******************************************************************************************/


/*******************
 * For File Uploading 
 **************************/
        app.directive('fileModel', ['$parse', function($parse) {
                return {
                    restrict: 'A',
                    link: function(scope, element, attrs) {
                        var model = $parse(attrs.fileModel);
                        var modelSetter = model.assign;
                        element.bind('change', function() {
                            scope.$apply(function() {
                                modelSetter(scope, element[0].files[0]);
                            });
                        });
                    }
                };
            }]);

        app.service('fileUpload', ['$http', function($http) {
                this.uploadFileToUrl = function(file, uploadUrl) {
                    var fd = new FormData();
                    fd.append('userfile', file);
                    $http.post(uploadUrl, fd, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                    })
                            .success(function(data) {
                        return data;
                    })
                }
            }]);
/*******************************************************************************************/






/***********************************
 * Configure the Routes 
 * ****************************/
        app.config(['$routeProvider', function($routeProvider) {
                $routeProvider
                        // Home
                        .when("/", {templateUrl: site_url + "home/homepage",
                    controller: "home"
                })
                        .when("/test", {templateUrl: site_url + "user/test",
                })
                        // Sigup Pages
                        .when("/signup", {templateUrl: site_url + "home/register",
                    controller: "signup"
                })
                        .when("/user", {templateUrl: site_url + "home/user",
                            //controller: "user", 
                })
                        .when("/password", {templateUrl: site_url + "user/password",
                    controller: "password"
                })

                        //--------Deal Section Start-----

                        .when("/deals", {templateUrl: site_url + "user/deals_view",
                    controller: "deals"
                })
                        .when("/assigned", {templateUrl: site_url + "user/deals_view",
                    controller: "deals"
                })
                        .when("/deals/:deal_id", {templateUrl: site_url + "user/deals_detils/",
                    controller: "deals_details"
                })
                        .when("/add/deals", {templateUrl: site_url + "user/adddeal/",
                    controller: "add_deal"
                })
                        .when("/your_deal/:deal_id", {templateUrl: function(params) {
                        return site_url + "user/your_deal_detail/" + params.deal_id;
                    },
                    controller: "your_deal"
                })
                        .when("/query/:query_id", {templateUrl: function(params) {
                        return site_url + "user/query_detail/" + params.query_id;
                    },
                    controller: "query_detail"
                })


                        //-----Message Section Start
                        .when("/message", {templateUrl: site_url + "user/message/",
                    controller: "message"
                })
                        .when("/message/sent", {templateUrl: site_url + "user/message/",
                    controller: "message"
                })
                        .when("/message/compose", {templateUrl: site_url + "user/compose_message/",
                    controller: "compose_message"
                })
                        .when("/details/:msg_id/:type", {templateUrl: function(params) {
                        return site_url + "user/details_message/" + params.msg_id + '/' + params.type;
                    },
                    controller: "msg_details"
                })

                        // 404 Pages
                        .otherwise({templateUrl: site_url + "home/homepage",
                    controller: "home"
                });
            }]);

/*******************************************************************************************/




/********************* * 
 * Check User Authentication 
 *******************************/
    app.run(function($rootScope, $location, $http) {
        $rootScope.$on("$routeChangeStart", function(event, next, current) {
            $http.get(site_url + 'home/check').then(function(data) {
                data = data.data;
                if (data.u_email) {
                    $rootScope.authenticated = true;
                    //$rootScope.uid = data.u_id;
                    $rootScope.name = data.comp_person_gender + ' ' + data.comp_person_name;
                    $rootScope.email = data.u_email;
                    $rootScope.image = data.comp_person_image;
                } else {
                    $rootScope.authenticated = false;
                    var nextUrl = next.$$route.originalPath;
                    if (nextUrl == '/signup' || nextUrl == '/login') {
                    } else {
                        $location.path("/");
                    }
                }
            });
        });

    });
/*******************************************************************************************/



/**********************************
 * Login and Home page  
 ************************************/
        app.controller('home', function($scope, $http, $location, $window, $route, $interval) {

            $scope.formData = {};
            $scope.login = function() {
                var request = $http({
                    method: "post",
                    url: site_url + "home/login",
                    data: $.param($scope.formData),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });

                request.success(function(data) {

                    if (data.trim() == 'error') {
                        $("#lemail").addClass('error');
                        $("#lpass").addClass('error');
                    } else if (data.trim() == '1') {
                        $window.location = site_url + 'admin';
                    } else if (data.trim() == '2') {
                        $window.location = site_url + 'cityadmin/';
                    } else if (data.trim() == '3') {
                        $location.path('/user')
                    }
                });
            }

            //---Logout Function 
            $scope.logout = function() {
                $http.get(site_url + 'home/logout').then(function(data) {
                    $route.reload();
                });
            }

        });

/*******************************************************************************************/



/**********************
 * SignUp Form Controllre 
 ************************************/

        app.controller('signup', function($scope, $http,toaster) {
            $http.get(site_url + 'ajax/country').success(function(data) {
                $scope.countries = data.countries;
                $scope.cities = data.cities;
            });

            //---Get tha City list
            $scope.updateCountry = function() {
                $scope.availablecity = [];
                angular.forEach($scope.cities, function(value) {
                    if (value.country_id == $scope.signup.comp_country.id) {
                        $scope.availablecity.push(value);
                    }
                });
            }


            $scope.signup = {};

            $scope.uniquemail = true;

            $scope.register = function(user) {
                var request = $http({
                    method: "post",
                    url: site_url + "home/signup",
                    data: $.param($scope.signup),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    data.trim();
                    if (data=='0') {
                        $scope.uniquemail = false;
                        //$scope.success = "Please Fill All Values !!";
                        toaster.pop('error', "", 'Please Fill All Values !!');
                    } else if (data == '1') {
                       // $scope.success = "Registration Successfully !!";
                         toaster.pop('success', "", 'Registration Successfully !!');
                        $scope.reset(sgnpform);
                        $scope.reset();
                    }
                });
            };

            $scope.reset = function(sgnpform) {
                if (sgnpform) {
                    sgnpform.$setPristine();
                    sgnpform.$setUntouched();
                }
                $scope.signup = angular.copy($scope.master);
            };
            $scope.reset();
        });

/*******************************************************************************************/




/*********************************
 * Password Update Controller
 **************************************/
        app.controller('password', function($scope, $http, $route, toaster) {
            $scope.pass = {}
            $scope.password = function(pass) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/pass_update",
                    data: $.param($scope.pass),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    toaster.pop(data.type, "", data.msg);
                });
            };
        });

/*******************************************************************************************/

/*********************************
 * Profile Show Section 
 **************************************/
//        app.controller('user', function($scope, $http, $route, toaster) {
//            $scope.userdata={};
//            $http.get(site_url + 'user/your_deal_detail_data/' + $routeParams.deal_id).success(function(data) {
//                $scope.userdata = data;
//            });
//        }); 

/*******************************************************************************************/



/*********************************
 * All Deals list Controller 
 **************************************/

        app.controller('deals', function($scope, $http, $route, $location) {
            //--Get All data 

            $scope.currentPage = 1;
            $scope.pageSize = 5;

            if ($location.path() == "/assigned") {
                $http.get(site_url + 'user/assigned').success(function(data) {
                    $scope.deals = data;
                });
                $scope.title = "Assigned Deals";

            } else {
                $http.get(site_url + 'user/deals').success(function(data) {
                    $scope.deals = data;
                });
                $scope.title = 'Deals';
            }

        });

/*******************************************************************************************/


/*********************************
 * Your Deals Details  Controller 
 **************************************/

        app.controller('your_deal', function($scope, $http, $route, $location, $routeParams, $upload,toaster) {
            $scope.deal = {};
            $scope.dealshow = {};


      $scope.getdata=function (){
            $http.get(site_url + 'user/your_deal_detail_data/' + $routeParams.deal_id).success(function(data) {
                $scope.deal = data.deal;
                $scope.dealshow = data.deal;
                $scope.query = data.query;
            });
            
      }
            
            $scope.getdata();
            
            $scope.removefile=function(fileid){
                if (confirm('Are you sure you want to delete this file?') ) {                    
                     $http.post(site_url + 'user/removefile/', { id: fileid }).success(function(response) {
                       $('#'+fileid).remove();
                       toaster.pop('success', "","Doc File Successfully Removed !!");
                     });
                }
            }

            $scope.query_reply = function(queryreply, queryid) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/query_reply",
                    data: $.param({queryreply: queryreply, queryid: queryid}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    toaster.pop(data.type, "", data.message);
                    $scope.query = '';
                     $scope.getdata()
                });
            };



            //---Upload deal files
           
        
        $scope.doc_file=[];        
            $scope.$watch('files', function(files) {
               if (files != null) {
                   for (var i = 0; i < files.length; i++) {
                       $scope.errorMsg = null;
                       (function(file) {
                               uploadUsing$upload(file);
                       })(files[i]);
                   }
               }
           });

           function uploadUsing$upload(file) {
                   file.upload = $upload.upload({
                           url: site_url + "user/upload_file",
                           method: 'POST',
                           headers: {
                                   'my-header' : 'my-header-value'
                           },
                           fields: {username: $scope.username},
                           file: file,
                           fileFormDataName: 'userfile'
                   });
                   file.upload.then(function(data) {                       
                       $scope.doc_file.push(data.data.name); 
                       toaster.pop(data.data.type, "", data.data.msg);   
                   });
                   file.upload.progress(function(evt) {
                           // Math.min is to fix IE which reports 200% sometimes
                           file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
                   });

           }

            $scope.update_deal = function(deal) {
                deal.docfile='';
                deal.doc_file=$scope.doc_file;
                console.log(deal);
               var request = $http({
                    method: "post",
                    url: site_url + "user/deal_update",
                    data: $.param(deal),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    $scope.query = ' ';
                    $route.reload();
                    toaster.pop('success', "","Deal Information Successfully Update !!");
                });
            };

        });

/*******************************************************************************************/


/*********************************
 * Add Deal Controller 
 **************************************/

    app.controller('query_detail', function($scope, $http, $route, $location, $routeParams,toaster) {        
        
        $scope.get_discussion=function(){
                $http.get(site_url + 'user/query_discussion/' + $routeParams.query_id).success(function(data) {
                $scope.query_discuss = data;                
            });
        }
        
        $scope.query_discuss=$scope.get_discussion();
        
        $scope.query_reply = function(queryreply, queryid) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/query_reply",
                    data: $.param({queryreply: queryreply, queryid: queryid}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    toaster.pop(data.type, "", data.message);
                    $scope.reply_msg = ' ';
                    $scope.queryreplyfrm = false;                    
                    $scope.get_discussion();
                    
                });
            };

            
            
    });

/*******************************************************************************************/



/*********************************
 * Add Deal Controller 
 **************************************/

        app.controller('add_deal', function($scope, $http, $route, $location, $upload,toaster) {
            
            $scope.currentPage = 1;
            $scope.pageSize = 5;
            
            $scope.message = '';
            $scope.deal={}
            $scope.title = 'Yours Deals ';
            $scope.getdeal = function() {
                $http.get(site_url + 'user/your_deal').success(function(data) {
                    $scope.deals = data;
                });
            }

            $scope.getdeal();

            //---Insert add Deal Data
            $scope.add_deal = function(deal) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/add_deal",
                    data: $.param(deal),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                   // $scope.message = data;
                    toaster.pop(data.type, "", data.msg);  
                    $scope.deal = {};
                    $scope.addfrm = !$scope.addfrm;
                    $scope.getdeal();
                    $scope.file_message = {};

                });
            }
            
       	$scope.deal.doc_file=[];
        
         $scope.$watch('files', function(files) {
            if (files != null) {
                for (var i = 0; i < files.length; i++) {
                    $scope.errorMsg = null;
                    (function(file) {
                            uploadUsing$upload(file);
                    })(files[i]);
                }
            }
	});
        
	function uploadUsing$upload(file) {
		file.upload = $upload.upload({
			url: site_url + "user/upload_file",
			method: 'POST',
			headers: {
				'my-header' : 'my-header-value'
			},
			fields: {username: $scope.username},
			file: file,
			fileFormDataName: 'userfile'
		});
		file.upload.then(function(data) {
                    $scope.deal.doc_file.push(data.data.name);                    	
                    toaster.pop(data.data.type, "", data.data.msg);   
                });
		file.upload.progress(function(evt) {
			// Math.min is to fix IE which reports 200% sometimes
			file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
		});
		
	}
        
        

            //---Upload deal files
//            $scope.file_message = {};
//            $scope.uploadFile = function() {
//                var fd = new FormData();
//                fd.append('userfile', $scope.myFile);
//                $http.post(site_url + "user/upload_file", fd, {
//                    transformRequest: angular.identity,
//                    headers: {'Content-Type': undefined}
//                }).success(function(data) {
//                    //data.trim();
//                    toaster.pop(data.type, "", data.msg);                    
//                    $scope.deal.doc_file = data.name;
//                    
//                });
//            }

        });


/*******************************************************************************************/



/*************************
 * Deal Details Pages
 *******************************/
        app.controller('deals_details', function($scope, $http, $route, $routeParams,toaster) {

            $scope.deal = {};
            $scope.query_list = {};


            //---Get  Deal and Query Data
            $http.get(site_url + 'user/deals/' + $routeParams.deal_id).success(function(data) {
                $scope.deal = data.deal;
                $scope.query_list = data.query;
            });



            //---Reply and Message Sending Functionality 
            $scope.message = '';
            $scope.query = '';
            $scope.mssg = '';

            //--  Send Query message to Deal User
            $scope.deal_query = function(query, id) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/send_query",
                    data: $.param({query: $scope.query, id: id}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    toaster.pop(data.type, "", data.message);
                    $scope.query = ' ';
                    if (data.query) {
                        $scope.query_list = data.query;
                    }
                });
            };


            //--Send Message To deal user
            $scope.deal_msg = function(msge, id) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/send_msg",
                    data: $.param({msg: $scope.msge.mssg, id: id, subject: $scope.msge.subject}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                   toaster.pop(data.type, "", data.message);
                    $scope.msge.mssg = ' ';
                    $scope.msge.subject = ' ';

                });
            };


            //--reply Query Message 
            $scope.query_reply = function(queryreply, queryid) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/query_reply",
                    data: $.param({queryreply: queryreply, queryid: queryid}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    toaster.pop(data.type, "", data.message);
                    $scope.query = ' ';
                    if (data.query) {
                        $scope.query_list = data.query;
                    }
                });
            };

        });
/*******************************************************************************************/



/*************************
 * Deal Message Pages
 *******************************/
//--Show all Sent and Recive Messages
        app.controller('message', function($scope, $http, $route, $routeParams, $location) {

            $scope.currentPage = 1;
            $scope.pageSize = 10;

            $scope.message = {};
            
            $scope.type = "";
            
            if ($location.path() == "/message/sent") {
                $scope.title = "Sent Message";
                $scope.type = "Receiver";
                
                //---Get  All Sent Message Q0uery Data
                $http.get(site_url + 'user/sent/').success(function(data) {
                    $scope.message = data;
                });


            } else {
                $scope.title = "Inbox Message"
                $scope.type = "Sender"
                
                //---Get  All Inbox Message Q0uery Data
                $http.get(site_url + 'user/inbox/').success(function(data) {
                    $scope.message = data;
                });
            }

        });



        //-- Show Message Details
        app.controller('msg_details', function($scope, $http, $route, $routeParams, $location,toaster) {
            $scope.msg = {};
            $scope.send_msg = function(msg) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/send_msg",
                    data: $.param({msg: $scope.msg.mssg, reciver_id: $scope.msg.reciver_id, subject: $scope.msg.subject}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    toaster.pop(data.type, "", data.message);
                    $scope.msg.mssg = ' ';
                    $scope.msg.subject = ' ';

                });
            };

        });


        app.controller('compose_message', function($scope, $http, $route, $routeParams,toaster) {
            $scope.msg = {};
            $scope.send_msg = function(msg) {
                var request = $http({
                    method: "post",
                    url: site_url + "user/send_msg",
                    data: $.param({msg: $scope.msg.mssg, reciver_id: $scope.msg.reciver_id, subject: $scope.msg.subject}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                request.success(function(data) {
                    //$scope.message = data;
                    toaster.pop(data.type, "", data.message);
                    $scope.msg.mssg = ' ';
                    $scope.msg.subject = ' ';

                });
            };

        });

/*******************************************************************************************/



/************
 * Alert message 
 ******************/

        app.controller('alert', function($scope, $http, $route, $routeParams, $interval) {
            $scope.alertmsg = {};
            $scope.alertquery = {};
            
            $scope.alert=function() {
                $http.get(site_url + 'user/alert/').success(function(data) {
                    //data.trim();
                    $scope.alertmsg = data.message;                    
                    $scope.alertquery =data.query;
                });
            };     
            
            $scope.alert();
            $interval($scope.alert, 5000);            
        });




/*******************************************************************************************/


//function query_alert(){
//    $http.get(site_url + 'user/index').success(function(data){   
//       console.log('asdasdda');
//    });
//};                  





/***
 * This Function use for insert Deal reply Msg in the data base
 ******/
//app.factory('dealfactory', function($http) {
//    return {
//        reply_list: function(query_id) {
//            $http.get(site_url + 'user/reply_list/'+query_id).success(function(data) {
//            return data;
//            });
//        }
//    };
//});



