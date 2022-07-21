websiteApp.controller('NotificationController', ['$rootScope','$scope','$firebaseArray','$stateParams','$filter', 'Notification', function($rootScope,$scope, $firebaseArray, $stateParams,$filter, Notification) {
    
    $scope.notifications= Notification.all($rootScope.logged_user.id);

   
}]);

