websiteApp.controller('ContactUsController', ['$rootScope','$scope','ContactUs', function($rootScope,$scope, ContactUs) {
    $scope.validate_errors = "";
    $scope.SaveContact = function(contact) {
    	ContactUs.addContact(contact,function (response) {
    		if(response.status){
            	$rootScope.message_error = response.message;
                $scope.contact = {};
            }
            $rootScope.scrollTo('header');
    	},function (error) {
            if (error.status == 422){ 
                if(error.data.errors)
                    $scope.validate_errors = error.data.errors;
            }

        });
    }

}]);
