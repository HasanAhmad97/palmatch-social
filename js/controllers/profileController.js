websiteApp.controller('ProfileController', ['$rootScope','$scope','Profile','$http','$uibModal', function($rootScope,$scope, Profile,$http,$uibModal) {
	$rootScope.galleryImages = [];
	Profile.AuthProfileData(function(response) {
    	$scope.user = response.data;
        $rootScope.galleryImages = $scope.user.user_gallery;
    });

    $rootScope.cropAlbumImage = function () {
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
                $scope.shape = 'rectangle';
                
                var fd = new FormData();

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
                    fd.append('image0',$scope.myCroppedImage);

                    $http({
                        method: 'POST',
                        url: 'add-gallery-photo',
                        data:fd,
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined},
                        cache: false
                    }).then(function successCallback(response) {
                        if(response.data.status){
                            $rootScope.galleryImages = response.data.gallary_imgs ;
                        }else{
                            $rootScope.message_error = response.data.msg;
                            $rootScope.scrollTo('header');
                        }
                    }, function (error) {
                        if (error.status == 422){ 
                            $rootScope.message_error = error.data.message;
                            $rootScope.scrollTo('header');
                        }
                    });
                     $uibModalInstance.dismiss('cancel');

                }

                $scope.cancel = function () {
                    $uibModalInstance.dismiss('cancel');
                };
            }
        });
    };

    // $scope.choosePhoto = function (e) {
    //     var index =0;
    //     var fd = new FormData();
    //     angular.forEach(e.files, function (file) {
    //         if (e.files && e.files[0]) {
    //             var reader_ = new FileReader();
    //             reader_.readAsDataURL(file);
    //         }        
    //         fd.append('image'+index,file);
    //         index++;
    //     });
       
        
    // };

    $scope.showImage = function (image) {
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

    $scope.DeleteImage = function (id,image) {
        Profile.deleteImageGallary({id:id},function(response) {
            if(response.status){
                var index = $rootScope.galleryImages.indexOf(image);
                $rootScope.galleryImages.splice(index, 1); 
            }

           
        });
    }

}]);

websiteApp.controller('EditProfileController', ['$rootScope','$scope','$http','Profile','$filter','$uibModal','$timeout', function($rootScope,$scope,$http, Profile,$filter,$uibModal,$timeout) {
    
    var date = new Date();
    month = '' + (date.getMonth() + 1),
    day = '' + date.getDate(),
    year = date.getFullYear();
    $scope.tab = 'Profile_Photo';
    $scope.interests =[];
    $scope.hobbies =[];
    $scope.social_links =[];
    $scope.selectSocials = [];
    $scope.gallary =[];
    $scope.edit_link ="";


    Profile.editprofile(function(response) {
        $scope.maxDate = $filter('date')(new Date((year-18)+'-'+month+'-'+day), 'yyyy-MM-dd') ;
    	$rootScope.user_profile = response.data;
        $rootScope.profileImage= response.data.photo;
        $rootScope.coverImage= response.data.cover;
        $scope.options = response.options;
        $scope.cities = response.options.cities;
        $scope.selectSocials = response.options.social_links;
        $rootScope.user_profile.dob = new Date($rootScope.user_profile.dob);
        $scope.social_links = $rootScope.user_profile.user_social_media;
        $scope.validate_errors ="";
        angular.forEach($rootScope.user_profile.interests, function (item) {
            $scope.interests.push(item.interest_id) ;
        });
        angular.forEach($rootScope.user_profile.hobbies, function (hobby) {
            $scope.hobbies.push(hobby.hobby_id) ;
        });

    });
    
    var fd = new FormData();



    $scope.chooseCover = function (e) {
        var $input = e;
        if (e.files && e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $($input).parent().parent().find(".cover")
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(e.files[0]);
        }
        fd.append('cover',e.files[0]);
    };

    $scope.itemSelect = function (selected,id) {
        if(selected){
            $scope.hobbies.push(id);
        }else{
            var index = $scope.hobbies.indexOf(id);
            $scope.hobbies.splice(index, 1);
        }
    }

    $scope.countryCities = function (country_id) {
        Profile.getCities({id:country_id},function(response) {
            $scope.cities = response.cities;
        });
    }

    $scope.interestSelect = function (selected,id) {
        if(selected){
            if($scope.interests.indexOf(id) < 0)
                $scope.interests.push(id);
        }else{
            var index = $scope.interests.indexOf(id);
            $scope.interests.splice(index, 1);
        }
    }

    $scope.addSocialLinks = function (social_media,link) {
        if(social_media && link){
            var social = {'link':link,'social_id':social_media.id,'social_media':social_media}
            $scope.social_links.push(social);
            var index = $scope.selectSocials.indexOf(social_media);
            $scope.selectSocials.splice(index, 1); 
            $scope.link ="";
        }
    }

    $scope.deleteSocial = function (social_link,social_media) {
        var index = $scope.social_links.indexOf(social_link);
        $scope.social_links.splice(index, 1); 
        $scope.selectSocials.push(social_media);
    }

    $scope.editSocial = function (social_link,social_media) {
        $scope.selectSocials.push(social_media);
        $scope.social_select = social_media;
        $scope.edit_link =social_link.link;
        var index = $scope.social_links.indexOf(social_link);
        $scope.social_links.splice(index, 1); 
    }

    $scope.editSocialLinks = function (social_link,edit_link) {

        var social = {'link':edit_link,'social_id':$scope.social_select.id,'social_media':$scope.social_select}
        $scope.social_links.push(social);
        var index1 = $scope.selectSocials.indexOf($scope.social_select);
        $scope.selectSocials.splice(index1, 1); 
        $scope.edit_link ="";
    }

    $rootScope.saveProfile = function (user) {
        
        if($rootScope.avatar_change)
            fd.append('photo',$rootScope.profileImage);
        if($rootScope.cover_change)
            fd.append('cover',$rootScope.coverImage);

        fd.append('hobbies', $scope.hobbies);
        fd.append('interests', $scope.interests);
        fd.append('social_links', JSON.stringify($scope.social_links));

        Object.keys(user).forEach(function(key) {
            if(key != 'photo' && key != 'cover' && key !='hobbies' && key != 'interests')
                fd.append(key,user[key]);
        });

        
        if($scope.hobbies.length > 0 || $scope.interests.length > 0){
            $http({
                method: 'POST',
                url: 'edit-profile-data',
                data:fd,
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined},
                cache: false
            }).then(function successCallback(response) {
                console.log(response);
                if(response.data.status){
                    $rootScope.logged_user.photo = response.data.user.photo;
                    $rootScope.logged_user.name = response.data.user.name;
                    $rootScope.scrollTo('header');
                    $rootScope.message_error = $filter('translate')('Save Successfully');
                }
            }, function (error) {
                if (error.status == 422){ 
                    if(error.data.errors)
                        $scope.validate_errors = error.data.errors;
                        $rootScope.message_error = error.data.message;
                }

            });
        }else{
            $rootScope.message_error = $filter('translate')('The given data was invalid');
        }
    };



}]);
