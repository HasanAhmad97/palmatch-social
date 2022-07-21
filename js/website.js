var websiteApp = angular.module('websiteApp', [
    'ui.router',
    'ui.router.middleware',
    'ngResource',
    'ui.bootstrap',
    'ngCookies',
    'duScroll',
    'pascalprecht.translate',
    'countTo',
    'oc.lazyLoad',
    'satellizer',
    'firebase',
    'ngSanitize',
    'ngImgCrop'
    ]);

websiteApp.constant("CSRF_TOKEN", 'csrf_token()');

websiteApp.config(function ($httpProvider) {
    $httpProvider.interceptors.push(function ($q, $rootScope,$timeout,$injector) {
        return {
            request: function (request) {
                console.log(request);
                var str = request.url;
                if(!str.includes("auth") && !str.includes("country") && !str.includes("lang-data") && !str.includes("footer-data") && !str.includes("user-subscribe") )
                    $rootScope.pageLoaded = false;
                return request;
            },
            response: function (response) {   
                $rootScope.pageLoaded = true;
                if(response.status == 200){
                    $rootScope.errors ={};
                    if (response.data.status == false && response.data.statusCode == 401 || response.data.status == "Authorization Token not found" || response.data.status == "Token is Invalid") {
                        $rootScope.authorization = false;
                        $rootScope.logged_user = null;
                        localStorage.removeItem("logged_user");
                        localStorage.removeItem("authorization");
                        window.location = '#/home';
                    }
                    else if($rootScope.logged_user != null){
                        var userLastOnlineRef = firebase.database().ref("users/"+$rootScope.logged_user.id);
                        userLastOnlineRef.update({status:"online"});
                        userLastOnlineRef.onDisconnect().update({lastOnline:firebase.database.ServerValue.TIMESTAMP,status:"offline"});
                    }
                }else if(response.status == 226){
                    window.location = '#/register';
                }else if(response.status == 225){
                    window.location = '#/home';
                }

                return response;
            },

            responseError: function (rejection) {
                $rootScope.pageLoaded = true;

                if (rejection.status === 401) {
                    $rootScope.authorization = false;
                    $rootScope.logged_user = null;
                    localStorage.removeItem("logged_user");
                    localStorage.removeItem("authorization");
                }
                if (rejection.status == 422){ 
                    if(rejection.data.errors)
                        $rootScope.validate_errors = rejection.data.errors;
                    else
                        $rootScope.error_msg = rejection.data.message;
                }
                else if (rejection.status == 500) {
                     $rootScope.toastMessages('error','Server Error! Retry');
                }
                else{
                    $scope.showError = true;
                    $rootScope.error_msg = 'Error';
                }

            }
        };
    });
});



websiteApp.config([ '$translateProvider', function ($translateProvider) {
    var $cookieStore;
    angular.injector(['ngCookies']).invoke(['$cookieStore', function (_$cookieStore) {
            $cookieStore = _$cookieStore;
        }]);
    
    $translateProvider.useStaticFilesLoader({
        prefix: '/translations/locale-',
        suffix: '.json'
    })
    
    $translateProvider.translations('en', translationsEN);
    $translateProvider.translations('ar', translationsAR);
    $translateProvider.translations('es', translationsES);
    $translateProvider.preferredLanguage($cookieStore.get('lang') ? $cookieStore.get('lang') : "en");
    $translateProvider.fallbackLanguage($cookieStore.get('lang') ? $cookieStore.get('lang') : "en");
    $translateProvider.useSanitizeValueStrategy('escape');
}]);

websiteApp.factory('Authenticate', ['$resource', function ($resource,CSRF_TOKEN) {
    return $resource('auth/' + ':operation/:provider', {id: '@id',provider:'@provider'}, {
        login: {method: 'POST', params: {operation: 'login',csrf_token: CSRF_TOKEN}},
        logout: {method: 'GET', params: {operation: 'logout',csrf_token: CSRF_TOKEN}},
        sign_up: {method: 'POST', params: {operation: 'sign_up',csrf_token: CSRF_TOKEN}},
    });
}]);

websiteApp.controller('HeaderController', ['$rootScope','$translate','$scope','Authenticate','$uibModal','$auth','Website','$window','$cookieStore','$state','$timeout', function($rootScope,$translate,$scope, Authenticate,$uibModal, $auth,Website, $window,$cookieStore,$state,$timeout) {
    
    Website.langData(function(response) {
        $rootScope.lang = response.current_lang; 
        $rootScope.languages = response.languages; 
    }); 

    $scope.changeLang = function (lang) {
        $rootScope.message_error = "";
        Website.lang({'lang':lang},function(response) {
            $translate.use(lang);
            $rootScope.lang = $translate.use();
            $cookieStore.put('lang', $translate.use());
            $state.reload();
        });
    } 

    $scope.hrefDropdown = function (state) {
        window.location = state;
    }

    $rootScope.signup_row={};
    $rootScope.SignUp = function () {
        $rootScope.login_row={};
        $uibModal.open({
            templateUrl: 'tpl/modals/signUp.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'sm',
            animation: true,
            controller: function ($rootScope,$scope,$window,$timeout,$uibModalInstance,Authenticate ,$log,$filter) {
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
                $scope.signUp_ = function (row) { 
                    $scope.loading = true;
                    Authenticate.sign_up(row,function (data) {
                        if(data.status){
                            $auth.login(row).then(function (data) {
                                var token = data.data && data.data.token;
                                if (token && data.status) {
                                    this.token = token;
                                    $auth.setToken(token);
                                     localStorage.setItem("logged_user", JSON.stringify(data.data.user));
                                    $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                                    localStorage.setItem("authorization", true);
                                    $rootScope.authorization = localStorage.getItem("authorization");
                                    var userLastOnlineRef = firebase.database().ref("users/"+data.data.user.id);
                                    userLastOnlineRef.update({status:"online"});
                                    userLastOnlineRef.onDisconnect().update({lastOnline:firebase.database.ServerValue.TIMESTAMP,status:"offline"});

                                    $window.location = "#/register";
                                }else{
                                    $rootScope.error_msg = data.msg;
                                }
                            });

                            $uibModalInstance.dismiss('cancel');
                        }else{
                            $rootScope.error_msg = data.message;                                    
                        }
                    }
                    );
                        
                };
            }
        });
      };
    
    $rootScope.login_row ={};
    $rootScope.pageLoaded =  true;
    $rootScope.Login = function () {
        $rootScope.signup_row={};
        $uibModal.open({
            animation: true,
            templateUrl: 'tpl/modals/login.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'sm',
            controller: function ($rootScope,$timeout,$filter,$scope, $auth,$uibModalInstance,Authenticate , $log,$window) {
                $rootScope.error_msg = null;
                $scope.loading = false;
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
          
                $scope.forget = function () {
                    $uibModalInstance.dismiss('cancel');
                    $window.location = "#/forget";
                };
                $scope.login = function (row) {
                    $scope.loading = true;
                   
                    $auth.login(row).then(function (data) {
                        var token = data.data && data.data.token;
                        if (token && data.status) {
                            this.token = token;
                            $auth.setToken(token);
                            if(data.data.user.is_active == 1){
                                $uibModalInstance.dismiss('cancel');
                                $rootScope.pageLoaded =  false;

                                $timeout(function () {
                                    $rootScope.pageLoaded =  true;
                                    localStorage.setItem("logged_user", JSON.stringify(data.data.user));
                                    $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                                    localStorage.setItem("authorization", true);
                                    $rootScope.authorization = localStorage.getItem("authorization");
                                    var userLastOnlineRef = firebase.database().ref("users/"+data.data.user.id);
                                    userLastOnlineRef.update({status:"online"});
                                    userLastOnlineRef.onDisconnect().update({lastOnline:firebase.database.ServerValue.TIMESTAMP,status:"offline"});

                                    if(!$rootScope.logged_user.is_complete == 1)
                                        $window.location = "#/register";
                                    else
                                        $state.go('home');
                                },500);
                            }else{
                                $uibModalInstance.dismiss('cancel');
                                $rootScope.Logout( $filter('translate')('error_activation'));
                            }
                        }else{
                            console.log(data.msg);
                            $rootScope.error_msg = data.data.msg;
                        }
                    });
                }

            }
        });
      };


    $rootScope.Logout = function (error='') {

        Authenticate.logout(function (response) {
            if(response.status){
                 $rootScope.pageLoaded =  false;
                // $timeout(function () {
                    $auth.logout().then(function () {
                        $rootScope.pageLoaded =  true;
                        $rootScope.authorization = false;
                        $rootScope.logged_user = null;
                        localStorage.removeItem("logged_user");
                        localStorage.removeItem("authorization");
                        if(error)
                            $rootScope.message_error = error;
                        else
                            $window.location.reload();
                    });
                // },500); 

            }       
        });
    };

}]);

websiteApp.controller('FooterController', ['$rootScope','$translate','$scope','Authenticate','$uibModal','$auth','Website','$window','$cookieStore','$state', function($rootScope,$translate,$scope, Authenticate,$uibModal, $auth,Website, $window,$cookieStore,$state) {
    $scope.email = {};
    Website.footerData(function(response) {
        $rootScope.socialMedia = response.SocialMedia; 
    }); 

    $scope.addSubscription = function (email) {
        Website.addSubscription({email:email.email},function(response) {
            $scope.email = {};
        });
    }

}]);

websiteApp.run(function($window,$rootScope,$sce, $state ,$document,$uibModal,$timeout,$cookieStore,$document,Website,Likes,Notification,$filter,$auth,$location,Profile) {
    $rootScope.pageLoaded = false;
    $rootScope.Image_Path ="assets/images";
    $rootScope.date = new Date();
    $rootScope.state = $state;
    $rootScope.message_error = '';
    $rootScope.logged_user = localStorage.getItem("logged_user") != 'undefined'?JSON.parse(localStorage.getItem("logged_user")):null;
    $rootScope.error_msg = null;
    if($rootScope.logged_user == null){
        if($location.search().user){
            $auth.setToken($location.search().user);
            Profile.AuthProfileData(function(response) {
                localStorage.setItem("logged_user", JSON.stringify(response.data));
                $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                localStorage.setItem("authorization", true);
                $rootScope.authorization = localStorage.getItem("authorization");
                var userLastOnlineRef = firebase.database().ref("users/"+response.data.id);
                userLastOnlineRef.update({status:"online"});
                userLastOnlineRef.onDisconnect().update({lastOnline:firebase.database.ServerValue.TIMESTAMP,status:"offline"});

                if(!$rootScope.logged_user.is_complete == 1)
                    $window.location = "#/register";
                else
                    $state.go('home');
            });
        }

    }else{
        $rootScope.authorization = localStorage.getItem("authorization");
    }

    $rootScope.close_msg = function() {
     $rootScope.message_error = '';
    }
 
    $rootScope.trustAsHtml = function(html) {
      return $sce.trustAsHtml(html);
    }

    $rootScope.LikeUser = function (user_like_id,type) {
        Likes.likeUser({user_like_id:user_like_id},function(response) {
            if(response.status){
                if(type == 2)
                    $rootScope.suitable_user.is_like = response.is_like;
                else if(type == 1)
                    $rootScope.random_user.is_like = response.is_like;
                else
                    $rootScope.isLike = response.is_like;
                if(response.is_like)
                    $rootScope.pushNotifications('like','Some one liked you','#/views',$rootScope.logged_user.id,user_like_id);    
            }
        });
    };

    $rootScope.userProfile = function (id) {
       
        $uibModal.open({
            animation: true,
            templateUrl: 'tpl/modals/user-modal.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'md',
            controller: function ($scope, Profile, Likes,$uibModalInstance,$uibModal) {
                    
                Profile.profileData({id:id},function(response) {
                    $scope.user = response.data;
                    $scope.is_like =  $scope.user.is_like;
                });
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
                $scope.likeUser = function (user_like_id) {
                    Likes.likeUser({user_like_id:user_like_id},function(response) {
                        if(response.status){
                            $scope.is_like = response.is_like;
                            if(response.is_like)
                                $rootScope.pushNotifications('like','Some one liked you','#/views',$rootScope.logged_user.id,user_like_id);    
                        }
                        // Likes.userLikes(function(response) {
                        //     $scope.users = response; 
                        // });
                    });
                };
                $scope.photoCover = function (image) {
                    $uibModal.open({
                        animation: true,
                        templateUrl: 'tpl/modals/photo-cover.html',
                        keyboard  : false,
                        windowClass: 'modal',
                        windowClass: 'show', 
                        size: 'md',
                        controller: function ($scope,$uibModalInstance) {
                            $scope.image = image;
                        
                            $scope.cancel = function () {
                                $uibModalInstance.dismiss('cancel');
                            };
                        }
                    });
                };
            }
             
        });

    };
    
    $rootScope.scrollTo  = function(id) {
      scroll_id = angular.element(document.getElementById(id));
      $document.scrollTo(scroll_id, 60, 1000);
    }

    $rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) { 
        $rootScope.scrollTo('header');
        $rootScope.message_error ="";
    })


    $rootScope.membership = function () {
        $uibModal.open({
            templateUrl: 'tpl/modals/membership.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            backdropClass: 'show',
            size: 'lg',
            animation: true,
            controller: function ($rootScope,$scope,$uibModalInstance,Subscriptions) {
                Subscriptions.subscriptions(function(response) {
                    $scope.subscriptions = response.subscriptions;
                    $scope.user_subscribe = response.user_subscribe;
                });
                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
                $scope.Subscription = function (subscription_id) {
                    Subscriptions.userSubscription({subscription_id:subscription_id},function(response) {
                        if(response.status)
                            $uibModalInstance.dismiss('cancel');
                    });
                };

            }
        });
    };

    $rootScope.pushNotifications = function(type,content, url,logged_user,reciver) {
        Notification.add(type,content,url,logged_user,reciver+"");
    };
    $rootScope.deleteNotification = function(notifi) {
        Notification.delete(notifi);
    };

    $rootScope.profileImage='';
    $rootScope.coverImage= '';
    $rootScope.avatar_change = false;
    $rootScope.cover_change = false;

    $rootScope.cropImage = function (type) {
        $uibModal.open({
            animation: true,
            templateUrl: 'tpl/modals/img-crop.html',
            keyboard  : false,
            windowClass: 'modal',
            windowClass: 'show', 
            size: 'md',
            controller: function ($scope,$uibModalInstance) {
                $scope.myCroppedImage='';
                $scope.myImage='';

                if(type == 'avatar')
                    $scope.shape = 'circle';
                else 
                    $scope.shape = 'rectangle';

                $scope.handleFileSelect=function(evt) {
                  var file=evt.files[0];
                  var reader = new FileReader();
                  reader.onload = function (evt) {
                    $scope.$apply(function($scope){
                      $scope.myImage=evt.target.result;
                    });
                  };
                  reader.readAsDataURL(file);
                };

                $scope.saveImage=function() {
                    if(type == 'avatar'){
                        $rootScope.avatar_change = true;
                        $rootScope.profileImage= $scope.myCroppedImage;
                    }
                    else if(type == 'cover'){
                        $rootScope.cover_change = true;
                        $rootScope.coverImage= $scope.myCroppedImage;
                    }
                    $uibModalInstance.dismiss('cancel');
                }

                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
            }
        });
    };


});
