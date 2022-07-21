websiteApp.controller('ResetPasswordController', ['$rootScope','$filter','$scope','Website','$location', function($rootScope,$filter,$scope, Website,$location) {
    $scope.display_old = true;
    if($location.search().token)
    	$scope.display_old = false;
    
    $scope.row = {};
    $scope.msg = null;
    $scope._resetPassword = function (row) {
        row.token = $location.search().token;
        Website.resetPassword(row, function (data) {
            $scope.errors =[];
            $scope.status = data.status;
            $scope.msg = data.msg;
            $scope.row = {};
        }, function (error) {
            if (error.status == 422){
                if(error.data.errors){
                    $scope.errors = error.data.errors;
                }
            }else{
                $scope.status = false;
                $scope.msg = 'Error';
            }

        });
    };

}]);
