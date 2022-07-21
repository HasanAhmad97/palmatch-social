websiteApp.config(['$middlewareProvider',
    function middlewareProviderConfig($middlewareProvider) {
      
      $middlewareProvider.map({
            'is-complete':function isComplete($rootScope,$q,$state) {
                $rootScope.message_error = "";
                if(!$rootScope.logged_user.is_complete){
                    this.redirectTo('register');
                }
                return this.next();
            }  ,
            'is-complete-reg':function isCompleteReg($rootScope,$q,$state) {
                if(!$rootScope.logged_user.is_complete){
                    return this.next();
                }
                this.redirectTo('home');
            }   ,
            'is-publish':function isPublish($rootScope,$q,$state) {
                if($rootScope.logged_user.is_publish){
                    return this.next();
                }
                this.redirectTo('home');
            }     
      });
      
    }
]);

/* Setup Rounting For All Pages */
websiteApp.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
    // Redirect any unmatched url

    
    $urlRouterProvider.otherwise("/home");
    
    $stateProvider
        .state('home', {
            url: "/home",
            templateUrl: 'views/home.html',
            data: {pageTitle: 'Home'},
            controller: "HomeController",
            // resolve: {
            //     authenticated: authentic
            // }
        })
        .state('likes', {
            url: "/likes",
            templateUrl: 'views/likes.html',
            data: {pageTitle: 'Likes'},
            controller: "LikesController",
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // }
        })
        .state('views', {
            url: "/views",
            templateUrl: 'views/viewers.html',
            data: {pageTitle: 'Views'},
            controller: "ViewsController",
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // }
        })
        .state('profile', {
            url: "/profile",
            templateUrl: 'views/profile.html',
            data: {pageTitle: 'My Profile'},
            controller: "ProfileController",
            // middleware:['is-complete'],
            // resolve: {
            //     authenticated: authentic
            // } 
        })
        .state('chat', {
            url: "/chat/:reciver_id",
            templateUrl: 'views/chats.html',
            data: {pageTitle: 'Chat'},
            controller: "ChatController",
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // } 
        })
        .state('notifications', {
            url: "/notifications",
            templateUrl: 'views/notifications.html',
            data: {pageTitle: 'Notifications'},
            controller: "NotificationController",
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // } 
        })
        .state('chats', {
            url: "/chats",
            templateUrl: 'views/usersChats.html',
            data: {pageTitle: 'Chat'},
            controller: "ChatsController",
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // } 
        })
        .state('discover', {
            url: "/discover",
            templateUrl: 'views/discover.html',
            data: {pageTitle: 'Discover'},
            params: {filters: null},
            controller: "DiscoverController", 
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // }
        })  
        .state('forget', {
            url: "/forget",
            templateUrl: 'views/forget.html',
            data: {pageTitle: 'Forgot Password'},
            controller: "ForgetController", 
        })
        .state('resetPassword', {
            url: "/resetPassword",
            templateUrl: 'views/resetPassword.html',
            data: {pageTitle: 'Reset Password'},
            controller: "ResetPasswordController",
        })

        .state('contactUs', {
            url: "/contactUs",
            templateUrl: 'views/contactUs.html',
            data: {pageTitle: 'Contact Us'},
            controller: "ContactUsController", 
        })
        .state('content', {
            url: "/content/:title",
            templateUrl: 'views/footerContent.html',
            data: {pageTitle: ''},
            controller: "footerContentController", 
        })
        .state('search', {
            url: "/search",
            templateUrl: 'views/search.html',
            data: {pageTitle: 'Search'},
            controller: "SearchController", 
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // }  
        })
        .state('details', {
            url: "/details/:title",
            templateUrl: 'views/details.html',
            data: {pageTitle: 'Details'},
            controller: "DetailsController", 
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // }  
        })
        .state('story', {
            url: "/story/:id",
            templateUrl: 'views/story.html',
            data: {pageTitle: 'Story'},
            controller: "StoryController", 
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic
            // }  
        })
        .state('register', {
            url: "/register",
            templateUrl: 'views/register.html',
            data: {pageTitle: 'Register'},
            controller: "RegisterController",
            middleware:['is-complete-reg'],
            // resolve: {
            //     authenticated: authentic
            // }         
        })
        .state('editProfile', {
            url: "/editProfile",
            templateUrl: "views/editProfile.html",
            data: {pageTitle: 'Edit Profile'},
            controller: "EditProfileController",
            middleware:['is-complete','is-publish'],
            // resolve: {
            //     authenticated: authentic,
            // } 
        })
        .state('faqs', {
            url: "/faqs",
            templateUrl: 'views/faqs.html',
            data: {pageTitle: 'FAQS'},
            controller: "FaqsController",            
        })

        function authentic($rootScope,Website,$q,$state) {
            var deferred = $q.defer();

            Website.isAuthenticate(function(response) {
                
                if(response.status){
                    var userLastOnlineRef = firebase.database().ref("users/"+response.user.id);
                    userLastOnlineRef.update({status:"online"});
                    userLastOnlineRef.onDisconnect().update({lastOnline:firebase.database.ServerValue.TIMESTAMP,status:"offline"});

                    localStorage.setItem("logged_user", JSON.stringify(response.user));
                    localStorage.setItem("authorization", true);
                    $rootScope.logged_user = JSON.parse(localStorage.getItem("logged_user"));
                    $rootScope.authorization = localStorage.getItem("authorization");

                    if(response.is_finished_subscribtion && $state.current.name != 'home'){
                        window.location ="#/home";
                        $rootScope.membership();

                    }
                }else{
                    localStorage.removeItem("logged_user");
                    localStorage.removeItem("authorization");
                    $rootScope.logged_user =null;
                    $rootScope.authorization =false;
                    if($state.current.name != 'home')
                        window.location ="#/home";
                }
                
                deferred.resolve();
                return deferred.promise;

            });

        };

}]);


