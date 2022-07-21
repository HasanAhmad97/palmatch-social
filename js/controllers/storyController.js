websiteApp.controller('StoryController', ['$rootScope','$scope','Story','$stateParams', function($rootScope,$scope, Story,$stateParams) {
  
    if($stateParams.id)
	  	Story.get({id:$stateParams.id},function(response) {
	        $scope.story = response; 
	    }); 



}]);
