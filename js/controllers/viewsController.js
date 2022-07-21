websiteApp.controller('ViewsController', ['$rootScope','$scope','Views', function($rootScope,$scope, Views) {
    
    Views.usersView(function(response) {
        $scope.users = response; 
    });

}]);
