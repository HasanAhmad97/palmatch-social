websiteApp.controller('SearchController', ['$rootScope','$scope','Search','$uibModal','$http', function($rootScope,$scope, Search,$uibModal,$http) {
  
  	$scope.filters = {'sortby':'Name'}; 
  	
  	Search.getOptions(function(response) {
        $scope.options = response; 
    });
    
    $scope.searchBy = function (filters) {
      var text = filters.sortByText;
       if(text.length>=3 || text.length==0)
          $scope.search(filters);
    }

  	$scope.search = function (filters) {
	  	Search.filterData(filters,function(response) {
        if(!response.data)
          $scope.users = response; 
        else{
	        $scope.users = response.data; 
          $scope.nextUrl = response.next_page_url;
          $scope.prevUrl = response.prev_page_url;
        }
	    }); 
	  };
    
  $scope.pagination = function (url,filters) {
    if(url != null)
      $http({
          method: 'POST',
          url: url,
          data:filters,
          cache: false
      }).then(function successCallback(response) {
          $scope.users = response.data.data;
          $scope.nextUrl = response.data.next_page_url;
          $scope.prevUrl = response.data.prev_page_url; 
      });
  };

	$scope.search($scope.filters);


}]);
