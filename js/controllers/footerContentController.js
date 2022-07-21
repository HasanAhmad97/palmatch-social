websiteApp.controller('footerContentController', ['$rootScope','$stateParams','$scope','Content','$filter', function($rootScope,$stateParams,$scope, Content,$filter) {
    $scope.settings = {};
    Content.getContent({title:$stateParams.title},function (response) {
        $scope.settings = response;
        if($stateParams.title == 'about_us'){
            $scope.contentTitle =$filter('translate')('About Us');
            $scope.content = $scope.settings.translation_all.about_us_content;
        }
        else if($stateParams.title == 'terms'){
            $scope.contentTitle =$filter('translate')('Terms and conditions');
            $scope.content = $scope.settings.translation_all.terms_content;
        }
        else if($stateParams.title == 'policy'){
            $scope.contentTitle =$filter('translate')('Privacy policy');
            $scope.content = $scope.settings.translation_all.policy_content;
        }

        else if($stateParams.title == 'why'){
            $scope.contentTitle =$filter('translate')('Why Palmatch');
            $scope.content = $scope.settings.translation_all.why_content;
        }

        else if($stateParams.title == 'how_works'){
            $scope.contentTitle =$filter('translate')('How Palmatch works');
            $scope.content = $scope.settings.translation_all.how_work_content;
        }
        $rootScope.scrollTo('header');
    });

    

	
        
}]);
