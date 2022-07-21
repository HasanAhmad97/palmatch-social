websiteApp.controller('FaqsController', ['$rootScope','$scope','Faqs', function($rootScope,$scope, Faqs) {
    
    Faqs.get(function(response) {
        $scope.faqs = response; 
    });

}]);
