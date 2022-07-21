websiteApp.controller('ChatController', ['$state','$rootScope','$scope','$firebaseArray','$stateParams','$filter','Chat','Channel', 'Message','$window','$timeout', function($state,$rootScope,$scope, $firebaseArray, $stateParams,$filter,Chat,Channel, Message,$window,$timeout) {
    $scope.message ="";
    $scope.chats = [];
    $scope.binding_msg = true;
  // check is_online reciver or not
    firebase.database().ref('users/'+$stateParams.reciver_id+ '/status').on("value", function(snapshot) {
      $timeout(function () {
          $scope.is_online =  snapshot.val();
      });
    }); 
  
  //  get reciver data

    Chat.getChannel({'reciver_id':$stateParams.reciver_id} ,function (data) {
        $scope.reciver = data.reciver;
        $rootScope.isLike = data.reciver.is_like;
    });


    var user_logged_ref = firebase.database().ref('users/'+$rootScope.logged_user.id+'/channels');
    $scope.suggest_users = $firebaseArray(user_logged_ref);
    


    user_logged_ref.on("child_added", function(snapshot) {
      var original = Channel.get($stateParams.reciver_id);
      var cast = Promise.resolve(original);
      cast.then(function(value) {
        if(value.exist){
          $scope.channel_id = Object.keys(value.value)[0];
          $scope.channel = Object.values(value.value)[0];
        }else{
          var channel = snapshot.val();
          if(($rootScope.logged_user.id == channel.sender_id && $stateParams.reciver_id == channel.reciver_id )
          ||($rootScope.logged_user.id == channel.reciver_id && $stateParams.reciver_id == channel.sender_id )){
            $scope.channel_id = snapshot.getKey();
            $scope.channel = snapshot.val();
          }
        }
        $timeout(function () {
          var channel_user_logged_ref = firebase.database().ref('users/'+$rootScope.logged_user.id+'/channels/'+$scope.channel_id);
          
          channel_user_logged_ref.on("child_removed", function(snapshot) {
              $scope.channel_id = undefined;
              $scope.channel = {};
          });
          channel_user_logged_ref.on("child_changed", function(snapshot) {
            var original = Channel.get($stateParams.reciver_id);
            var cast = Promise.resolve(original);
            cast.then(function(value) {
              if(value.exist){
                $scope.channel_id = Object.keys(value.value)[0];
                $scope.channel = Object.values(value.value)[0];
              }
            });
          });
          $scope.chats = Message.getByChannel($scope.channel_id);
        });
      });
    });
    


    // $scope.suggest_users = Channel.limit;
    // Chat.getChannel({'reciver_id':$stateParams.reciver_id} ,function (data) {
    //     $scope.activeChannel = 0;
    //     if(data.status){
    //       $scope.activeChannel = data.data.id;
    //       var original = Channel.get($scope.activeChannel);
    //       var cast = Promise.resolve(original);
    //       cast.then(function(value) {
    //           $scope.channel_id = Object.keys(value.value)[0];
    //           $scope.channel = Object.values(value.value)[0];
    //           if(!$scope.channel.accept){
    //             $scope.binding_msg = true;
    //           }
    //       });
    //     }

    //     $scope.reciver = data.reciver;
    //     $rootScope.isLike = data.reciver.is_like;
    //     $scope.changeChannel($scope.activeChannel);
    //     // $scope.chats = Message.getByChannel($scope.activeChannel);
    // });
    $scope.changeChannel = function(channel) {
        $scope.chats = Message.getByChannel(channel);
    };

    $scope.sendMessage = function(message) {
        
      if(angular.isUndefined($scope.channel_id)){
        $scope.channel_id = Channel.add($scope.reciver,message);
      }else{
        Message.send(message, $scope.channel_id,$rootScope.logged_user,$stateParams.reciver_id,$scope.channel);
      }
      $rootScope.pushNotifications('chat',message,'#/chat/'+$rootScope.logged_user.id,$rootScope.logged_user,$stateParams.reciver_id);    
      $scope.message ="";
            
            // var cast = Promise.resolve(original);
            // cast.then(function(value) {
            //   if(!value.exist){
            //     Chat.addChannel({user_id_one: $rootScope.logged_user.id,user_id_two:$stateParams.reciver_id} ,function (data2) {
            //       if(data2.status){
            //           Channel.add(data2.data.id,$rootScope.logged_user,$scope.reciver,message);
            //           $scope.activeChannel = data2.data.id;
            //           var original = Channel.get($scope.activeChannel);
            //           var cast = Promise.resolve(original);
            //           cast.then(function(value) {
            //             var channel_id = Object.keys(value.value)[0];
            //             Message.send(message, data2.data.id,$rootScope.logged_user,$stateParams.reciver_id,channel_id);
            //             $rootScope.pushNotifications('chat', message,'#/chat/'+$rootScope.logged_user.id,$rootScope.logged_user,$stateParams.reciver_id);    
            //             $state.reload();
            //         });
            //       }else{
            //           $rootScope.message_error = data2.msg;
            //           $rootScope.scrollTo('header');
            //       }
            //     }); 
            //   }
            // });
            
        // }

        
       
    };

    $scope.showTime ="";

    $scope.showTime_ = function(time){
      $scope.showTime =time;
    }

    $scope.deleteChannel = function(){
      if($scope.channel.sender.id == $rootScope.logged_user.id)
        Channel.delete($scope.channel_id,$rootScope.logged_user,'sender');
      else
        Channel.delete($scope.channel_id,$rootScope.logged_user,'reciver');
      
    }

    $scope.acceptReject = function(accept_reject) {
        Channel.acceptReject($scope.channel_id,accept_reject,$stateParams.reciver_id);
        $scope.binding_msg = false;
    };    

    // $scope.message ="";
    // $scope.chats = [];
    // var ref = firebase.database().ref('chats');
    // var messages ;
    // var channel_ref;
    // Chat.getChannel({'reciver_id':$stateParams.reciver_id} ,function (data) { 
    //   $scope.reciver = data.reciver;
    //   $rootScope.isLike = data.reciver.is_like;
    //   $scope.suggest_users = data.suggest_users;
    //   if(data.status){
    //     $rootScope.channel_id = data.data.id;
    //     ref.child(data.data.id).once('value').then((snapshot) => {
    //       $scope.channel = snapshot.val();
    //     });

    //     channel_ref = ref.child(data.data.id).child('messages');
    //     messages = $firebaseArray(channel_ref);
    //     $scope.chats = messages;

    //     ref.child(data.data.id).update({
    //         is_read:1,
    //         sender: $rootScope.logged_user,
    //         reciver:$stateParams.reciver_id
    //     });
    //   }
    //   else{
    //     Chat.addChannel({user_id_one: $rootScope.logged_user.id,user_id_two:$stateParams.reciver_id} ,function (data2) { 
    //   		$rootScope.channel_id = data2.id;
    //       ref.child(data2.id).update({
    //         sender: $rootScope.logged_user,
    //         reciver:$stateParams.reciver_id
    //       });

    //       ref.child(data2.id).once('value').then((snapshot) => {
    //         $scope.channel = snapshot.val();
    //       });

    //       channel_ref = ref.child(data2.id).child('messages');
    //       messages = $firebaseArray(channel_ref);
    //       $scope.chats = messages;

    //     });
    //   }
      
    // });



    // $scope.add = function(message){
        
    //         $scope.message ="";
    //         if(message != ""){
    //           var msg = {
    //             text: message,
    //             sentAt:$filter('date')(new Date, 'h:mma (M/d/yy)'),
    //             sender: $rootScope.logged_user,
    //             reciver:$stateParams.reciver_id
    //           }
    //           messages.$add(msg);
    //           ref.child($rootScope.channel_id).update({
    //             last_msg: message,
    //             is_read:0,
    //             sender_name:$rootScope.logged_user.name
    //           });
    //         }
         
    // }

    // $scope.deleteChannel = function(){
    //     ref.child($rootScope.channel_id).remove();
    // }


}]);

websiteApp.controller('ChatsController', ['$rootScope','$scope','$firebaseArray','$stateParams','$filter','Chat','Channel', function($rootScope,$scope, $firebaseArray, $stateParams,$filter,Chat,Channel) { 

  $scope.chats = Channel.all;
   
}]);
