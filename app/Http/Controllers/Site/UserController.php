<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\User\CompleteProfileRequest;
use App\Http\Requests\Site\User\EditProfileRequest;
use App\Http\Requests\Site\User\ContactUsRequest;
use App\Http\Requests\Site\User\SignUpRequest;
use App\Repositories\Eloquents\UserEloquent;
use Illuminate\Http\Request;
use App\Http\Requests\Site\User\ResetPasswordRequest;

class UserController extends Controller
{ 
    //
    protected $user;

    public function __construct(UserEloquent $user)
    {
        $this->user = $user;
    }

    public function signUp(SignUpRequest $request)
    {
        return $this->user->create($request->all());
    }

    public function completeProfile(CompleteProfileRequest $request)
    {
        return $this->user->completeProfile($request->all());
    }

    public function login(Request $request)
    {
        return $this->user->login($request->all());
    }

    public function profileData($id)
    {
        return $this->user->profileData($id);
    }

    public function AuthProfileData()
    {
        return $this->user->AuthProfileData();
    }
    
    public function editprofile()
    {
        return $this->user->editprofile();
    }

    public function getCities($id){
        return $this->user->getCities($id);
    }

    
    public function editprofileData(EditProfileRequest $request)
    {
        return $this->user->editprofileData($request->all());
    }

    public function addChannel(Request $request)
    {
        return $this->user->addChannel($request);
    }

    public function deleteChannel(Request $request)
    {
        return $this->user->deleteChannel($request);
    }

    public function addContact(ContactUsRequest $request)
    {
        
        return $this->user->addContact($request);
    }

    public function getChannel($reciver_id)
    {
        return $this->user->getChannel($reciver_id);
    }

    public function filterData(Request $request)
    {
        return $this->user->filterData($request);
    }
    public function filterDiscover(Request $request)
    {
        return $this->user->filterDiscover($request);
    } 
    public function detailsDiscover(Request $request)
    {
        return $this->user->detailsDiscover($request);
    } 
    public function userLikes()
    {
        return $this->user->userLikes();
    }
    public function usersView()
    {
        return $this->user->usersView();
    }
    public function subscriptions()
    {
        return $this->user->subscriptions();
    }
    public function userSubscribe($subscription_id)
    {
        return $this->user->userSubscribe($subscription_id);
    }
    public function likeUser(Request $request)
    {
        return $this->user->likeUser($request);
    }

    public function isAuthenticate()
    {
        return $this->user->isAuthenticate();
    }
    public function addGalleryPhoto(Request $request){
        return $this->user->addGalleryPhoto($request->all());
    }
    public function deleteGalleryPhoto($id){
        return $this->user->deleteGalleryPhoto($id);
    }
    public function logout()
    {
        return $this->user->logout();
    }
    public function resetPassword(ResetPasswordRequest $request)
    {
        return $this->user->resetPassword($request->all());
    }
    public function forgetPassword(Request $request)
    {
        return $this->user->forgetPassword($request);
    }
    public function addSubscription(Request $request)
    {
        return $this->user->addSubscription($request->all());
    }
    public function footerData()
    {
        return $this->user->footerData();
    }
    public function faqs()
    {
        return $this->user->faqs();
    } 
}
