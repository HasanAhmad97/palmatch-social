
websiteApp.factory('Website', function ($resource) {
    return $resource(':operation/:id/:lang', {},{
        homeData:{method:'GET'  , params: {operation:'home-data'}, isArray: false},
        langData:{method:'GET'  , params: {operation:'lang-data'}, isArray: false},
        lang:{method:'GET'  , params: {operation:'lang'}, isArray: false},
        footerData:{method:'GET'  , params: {operation:'footer-data'}, isArray: false},
        isAuthenticate: {method: 'GET', params: {operation: 'authenticate'}},
        resetPassword: {method: 'POST', params: {operation: 'resetPassword'}},
        forgetPassword: {method: 'POST', params: {operation: 'forgetPassword'}},
        addSubscription: {method: 'POST', params: {operation: 'addSubscription'}},

    })
});


websiteApp.factory('Profile', function ($resource) {
    return $resource(':operation/:id', {},{
       AuthProfileData:{method:'GET'  , params: {operation:'auth-profile-data'}, isArray: false},
       profileData:{method:'GET'  , params: {operation:'profile-data'}, isArray: false},
       editprofile:{method:'GET'  , params: {operation:'edit-profile'}, isArray: false},
       getCities:{method:'GET'  , params: {operation:'get-cities'}, isArray: false},
       addGalleryPhoto:{method:'POST'  , params: {operation:'add-gallery-photo'}, isArray: false},
       deleteImageGallary:{method:'GET'  , params: {operation:'delete-gallery-photo'}, isArray: false},

    })
});

websiteApp.factory('Register', function ($resource) {
    return $resource(':operation/:id', {},{
       getOptions:{method:'GET'  , params: {operation:'get-options'}, isArray: false},
       getCountryCode:{method:'GET'  , params: {operation:'country'}, isArray: false},
       completeProfile:{method:'POST', params: {operation:'complete-profile'}, isArray: false},
       editProfile:{method:'PUT', params: {operation:'edit-profile'}, isArray: false},
    })
});

websiteApp.factory('Search', function ($resource) {
    return $resource(':operation/:id', {},{
      getOptions:{method:'GET'  , params: {operation:'get-options'}, isArray: false},
      filterData:{method:'POST'  , params: {operation:'filter-data'}, isArray: false},
    })
});

websiteApp.factory('Likes', function ($resource) {
    return $resource(':operation/:id', {},{
      userLikes:{method:'GET'  , params: {operation:'user-likes'}, isArray: true},
      likeUser:{method:'POST'  , params: {operation:'like-user'}, isArray: false},
    })
});


websiteApp.factory('Views', function ($resource) {
    return $resource(':operation/:id', {},{
      usersView:{method:'GET'  , params: {operation:'users-view'}, isArray: true},
    })
});

websiteApp.factory('Faqs', function ($resource) {
    return $resource(':operation/:id', {},{
      get:{method:'GET'  , params: {operation:'faqs'}, isArray: true},
    })
});

websiteApp.factory('Discover', function ($resource) {
    return $resource(':operation/:id', {},{
      getOptions:{method:'GET'  , params: {operation:'get-options'}, isArray: false},
      filterDiscover:{method:'POST'  , params: {operation:'filter-discover'}, isArray: false},
      detailsDiscover:{method:'POST'  , params: {operation:'details-discover'}, isArray: false},

    })
});

websiteApp.factory('Chat', function ($resource) {
    return $resource(':operation/:reciver_id', {},{
      addChannel:{method:'POST'  , params: {operation:'add-channel'}, isArray: false},
      deleteChannel:{method:'POST'  , params: {operation:'delete-channel'}, isArray: false},
      getChannel:{method:'GET'  , params: {operation:'get-channel'}, isArray: false},
      chats:{method:'GET'  , params: {operation:'chats'}, isArray: true},
    })
});

websiteApp.factory('Subscriptions', function ($resource) {
    return $resource(':operation/:subscription_id', {},{
      subscriptions:{method:'GET'  , params: {operation:'subscriptions'}, isArray: false},
      userSubscription:{method:'GET'  , params: {operation:'user-subscribe'}, isArray: false},
    })
});
websiteApp.factory('Story', function ($resource) {
    return $resource('Story/:id', {},{
      get:{method:'GET'},
    })
});

websiteApp.factory('ContactUs', function ($resource) {
    return $resource(':operation/', {},{
      addContact:{method:'POST'  , params: {operation:'add-contact'}, isArray: false},
    })
});

websiteApp.factory('Content', function ($resource) {
    return $resource(':operation/:title', {},{
      getContent:{method:'GET'  , params: {operation:'get-content'}, isArray: false},
    })
});

websiteApp.factory('Channel', function ($firebaseArray,$rootScope,Message) {
    
    var date = new Date();

    var Channel = {};
    let daysAgo = date.getTime();
    
    var user_ref = firebase.database().ref('users/'+$rootScope.logged_user.id+'/channels');
    var user_channels = $firebaseArray(user_ref.orderByChild('sentAt'));
    
    var base_ref = user_ref.orderByChild('sentAt').limitToLast(9);
    var limit = $firebaseArray(base_ref);

    var ref = firebase.database().ref('channels');
    var channels = $firebaseArray(ref);

    return {
      all: user_channels,
      limit:limit,
      add: function(reciver,message) {
        var reciver_ref = firebase.database().ref('users/'+reciver.id+'/channels');
        var reciver_channels = $firebaseArray(reciver_ref);
        var sender = $rootScope.logged_user;
        var channel_add = {
          sender: sender,
          reciver: reciver,
          sender_id:sender.id,
          reciver_id:reciver.id,
          accept : false,
          last_message:message,
          del_sender:false,
          del_reciver:false,
          sentAt: daysAgo,
        };
        var add_channel = channels.$add(channel_add).then(function(value) {
            let id_ =  $rootScope.id_ = Object.values(Object.values(value)[1])[0][1];
            user_ref.child(id_).update(channel_add);
            reciver_ref.child(id_).update(channel_add);
            user_ref.child(id_).update({user_channel:reciver.id+""});
            reciver_ref.child(id_).update({user_channel:sender.id+""}); 
            
            Message.send(message,id_,$rootScope.logged_user,reciver.id,channel_add);
              
        });
      },
      acceptReject: function(channel,accept,reciver) {
        var user2_ref = firebase.database().ref('users/'+reciver+'/channels');
        if(accept){
          ref.child(channel).update({
            accept : true
          });
          user_ref.child(channel).update({
            accept : true
          });
          user2_ref.child(channel).update({
            accept : true
          });
        }else{
          user_ref.child(channel).remove();
          user2_ref.child(channel).remove();
          ref.child(channel).remove();
        }
      },
      get: function(reciver_id) {
        return user_ref.orderByChild('user_channel').equalTo(reciver_id+"").once('value').then((snapshot) => {
            return {exist:snapshot.exists(),value:snapshot.val()} ;
        });
        
      },
      delete:function(channel_id,logged_user,del_type){
        var channel_ref = firebase.database().ref().child('channels');
        if(del_type == 'sender')
          channel_ref.child(channel_id).update({
              del_sender : true
          });
        else
          channel_ref.child(channel_id).update({
              del_reciver : true
          });

      }
    };
});


websiteApp.factory('Message', function ($firebaseArray, $filter,$state) {
    
    var Message = {};

    Message.getByChannel = function(channel) {
      var messages_ = firebase.database().ref('channels/'+channel+'/messages');
      
      return $firebaseArray(messages_);
    };


    Message.send = function(newMessage, activeChannel,logged_user,reciver,channel=null) {
      var date = new Date();
      let daysAgo = date.getTime();
      
      var channel_ref = firebase.database().ref('channels/'+activeChannel);
      var user1_ref = firebase.database().ref('users/'+logged_user.id+'/channels/'+activeChannel);
      var user2_ref = firebase.database().ref('users/'+reciver+'/channels/'+activeChannel); 
        
      var messages = $firebaseArray(channel_ref.child('messages'));
      if(newMessage != "")
        messages.$add({
          text: newMessage,
          channelId: activeChannel,
          sentAt: $filter('date')(date, 'EEEE @ h:mma (M/d/yy)'),
          sender: logged_user,
          reciver:reciver
        });


        if(channel!= null){
          if(channel.reciver_id ==logged_user.id && channel.accept == false ){
            var update_data = {
                accept:true,
                last_message : newMessage,
                sentAt: daysAgo,
            }
          }else
            var update_data = {
                last_message : newMessage,
                sentAt: daysAgo,
            } 
        }else{
            var update_data = {
                last_message : newMessage,
                sentAt: daysAgo,
            }
        } 
              
        channel_ref.update(update_data);
        user1_ref.update(update_data);
        user2_ref.update(update_data);
    };
    return Message;
});

websiteApp.factory('Notification', function ($firebaseArray, $filter) {
    var Notification ={};
    var ref = firebase.database().ref('notifications');
    var notifications = $firebaseArray(ref);
    return {
      all: function(logged_user) {
          var notifications_ = ref.orderByChild('reciver').equalTo(logged_user+"");
          return $firebaseArray(notifications_);

      },
      delete:function(notifiId) {
        firebase.database().ref('notifications/' + notifiId).remove();
      },
      add: function(type,content, url,logged_user,reciver) {
        var date = new Date();
        notifications.$add({
          type: type,
          text: content,
          url: url,
          sentAt: $filter('date')(date, 'h:mma (M/d/yy)'),
          sender: logged_user,
          reciver:reciver,
        });
      }
    }

});