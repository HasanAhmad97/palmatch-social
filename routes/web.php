<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Site;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Social login providers... auth/redirect/facebook
Route::get('/provider/{provider}', 'Auth\LoginController@redirectToProvider')->name('redirectToProvider');
Route::get('/provider/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/',function (){
   return redirect('public/index.html');
});
Route::group(['prefix' => '/'], function () {

    Route::get('lang/{lang}', function ($lang) {
        session()->put('locale', $lang);
        return;
    });

    Route::get('/authenticate', [Site\UserController::class, 'isAuthenticate'])->name('authenticate');
    Route::get('/home-data', [Site\HomeController::class, 'index'])->name('home');
    Route::get('/lang-data', [Site\HomeController::class, 'langData'])->name('langData');
    
    Route::get('/footer-data', [Site\UserController::class, 'footerData'])->name('footerData');
    Route::get('/faqs', [Site\UserController::class, 'faqs'])->name('faqs');
    Route::post('/complete-profile', [Site\UserController::class, 'completeProfile'])->name('user.complete');

    Route::post('auth/sign_up', [Site\UserController::class, 'signUp'])->name('user.signUp');
    Route::post('auth/login', [Site\UserController::class, 'login'])->name('user.login');

    Route::post('/resetPassword', [Site\UserController::class, 'resetPassword'])->name('user.resetPassword');
    Route::post('/forgetPassword', [Site\UserController::class, 'forgetPassword'])->name('user.forgetPassword');
    Route::post('/addSubscription', [Site\UserController::class, 'addSubscription'])->name('user.addSubscription');

    Route::get('/auth/redirect/facebook', [Site\SocialController::class, 'redirectToFacebook'])->name('redirectToFacebook');
    Route::get('/auth/redirect/google', [Site\SocialController::class, 'redirectToGoogle'])->name('redirectToGoogle');
    Route::get('auth/facebook/callback', [Site\SocialController::class, 'callbackFacebook'])->name('social.callbackFacebook');
    Route::get('auth/google/callback', [Site\SocialController::class, 'callbackGoogle'])->name('social.callbackGoogle');


    Route::get('/profile-data/{id}', [Site\UserController::class, 'profileData'])->name('user.profileData');

    Route::post('/add-contact', [Site\UserController::class, 'addContact'])->name('user.addContact');

    Route::get('/get-content/{title}', [Site\HomeController::class, 'getContent'])->name('user.getContent');

    Route::group(['middleware' => ['auth:web']], function () {
        
        Route::get('/auth-profile-data', [Site\UserController::class, 'AuthProfileData']);

        Route::group(['middleware' => ['profile_complete','is_publish']], function () {
            Route::get('/user-likes', [Site\UserController::class, 'userLikes']);
            Route::get('/users-view', [Site\UserController::class, 'usersView'])->name('usersView');
            Route::post('/like-user', [Site\UserController::class, 'likeUser'])->name('likeUser');
            Route::post('/filter-discover', [Site\UserController::class, 'filterDiscover'])->name('discover');
            Route::post('/like-user', [Site\UserController::class, 'likeUser'])->name('likeUser');
            Route::post('/filter-data', [Site\UserController::class, 'filterData'])->name('search');
            Route::post('/details-discover', [Site\UserController::class, 'detailsDiscover'])->name('details');
            Route::post('/like-user', [Site\UserController::class, 'likeUser'])->name('likeUser');
            Route::post('/add-gallery-photo', [Site\UserController::class, 'addGalleryPhoto'])->name('user.addGalleryPhoto');
            Route::get('/delete-gallery-photo/{id}', [Site\UserController::class, 'deleteGalleryPhoto'])->name('user.deleteGalleryPhoto');
            Route::get('/get-channel/{reciver_id}', [Site\UserController::class, 'getChannel'])->name('user.getChannel');


        });

        Route::get('auth/logout', [Site\UserController::class, 'logout'])->name('user.logout');
        Route::get('/get-options', [Site\HomeController::class, 'register'])->name('user.register');
        Route::get('/edit-profile', [Site\UserController::class, 'editprofile'])->name('user.editprofile');
        Route::post('/edit-profile-data', [Site\UserController::class, 'editprofileData'])->name('user.editprofileData');
        Route::get('/get-cities/{id}', [Site\UserController::class, 'getCities'])->name('user.getCities');
        
        
        Route::post('/add-channel', [Site\UserController::class, 'addChannel'])->name('user.addChannel');
        Route::post('/delete-channel', [Site\UserController::class, 'deleteChannel'])->name('user.deleteChannel');
        Route::get('/chats', [Site\UserController::class, 'chats'])->name('user.chats');
        

        Route::get('/subscriptions', [Site\UserController::class, 'subscriptions'])->name('subscriptions');
        Route::get('/user-subscribe/{subscription_id}', [Site\UserController::class, 'userSubscribe'])->name('user.userSubscribe');

        Route::resource('country', 'Site\CountryController');
        Route::resource('Story', 'Site\StoryController');

    });

    Route::group(['middleware' => ['auth', 'profile_complete','is_publish']], function () {


        // delete from
        Route::get('/likes', [Site\HomeController::class, 'likes'])->name('likes');
        Route::get('/profile', [Site\HomeController::class, 'profile'])->name('profile');
        Route::get('/chat', [Site\HomeController::class, 'chat'])->name('chat');
        Route::get('/discover', [Site\HomeController::class, 'discover'])->name('discover');
        Route::get('/search', [Site\HomeController::class, 'search'])->name('search');
        Route::get('/chat-requests', [Site\HomeController::class, 'chatRequests'])->name('chat-requests');
        // delete to

    });

});

