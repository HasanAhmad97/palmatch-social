<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \App\Http\Controllers\Admin;

Route::get('/', function () {
    return redirect('admin/login');
});
Route::get('/login', [Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [Admin\LoginController::class, 'login']);

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/home', [Admin\HomeController::class, 'index']);
    Route::get('profile/{id}/edit', [Admin\ProfileController::class, 'edit']);
    Route::put('profile/{id}/edit', [Admin\ProfileController::class, 'update']);
    Route::post('/logout', [Admin\LoginController::class, 'logout']);

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [Admin\UserController::class, 'index']);
        Route::get('/user-data', [Admin\UserController::class, 'anyData']);
        Route::put('/user-status', [Admin\UserController::class, 'userActive']);
        Route::put('/user-publish', [Admin\UserController::class, 'userPublish']);
        Route::get('/{id}/view', [Admin\UserController::class, 'view']);


    });

    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', [Admin\AdminController::class, 'index']);
        Route::get('/admin-data', [Admin\AdminController::class, 'anyData']);
        Route::get('/{id}/view', [Admin\AdminController::class, 'view']);
        Route::get('/admin-create', [Admin\AdminController::class, 'create']);
        Route::post('/admin-create', [Admin\AdminController::class, 'store']);
        Route::get('/admin-edit/{id}', [Admin\AdminController::class, 'edit']);
        Route::put('/admin-edit/{id}', [Admin\AdminController::class, 'update']);
        Route::delete('/{id}/delete', [Admin\AdminController::class, 'delete']);
    });

    Route::group(['prefix' => 'emailSubscriptions'], function () {
        Route::get('/', [Admin\EmailSubscriptionsController::class, 'index']);
        Route::get('/email-data', [Admin\EmailSubscriptionsController::class, 'anyData']);
        Route::get('/email-create', [Admin\EmailSubscriptionsController::class, 'create']);
        Route::post('/email-create', [Admin\EmailSubscriptionsController::class, 'store']);
        Route::get('/email-edit/{id}', [Admin\EmailSubscriptionsController::class, 'edit']);
        Route::put('/email-edit/{id}', [Admin\EmailSubscriptionsController::class, 'update']);
        Route::get('/send-email/{id}', [Admin\EmailSubscriptionsController::class, 'replay']);
        Route::put('/send-email/{id}', [Admin\EmailSubscriptionsController::class, 'sendEmail']);
        Route::get('/send-email-all', [Admin\EmailSubscriptionsController::class, 'replyEmailToAll']);
        Route::post('/send-email-all', [Admin\EmailSubscriptionsController::class, 'sendEmailToAll']);

        Route::delete('email-delete/{id}', [Admin\EmailSubscriptionsController::class, 'delete']);
    });

    Route::group(['prefix' => 'subscriptions_management'], function () {
        Route::get('/', [Admin\SubscriptionManagementController::class, 'index']);
        Route::get('/subscriptions-management-data', [Admin\SubscriptionManagementController::class, 'anyData']);
        Route::get('/{id}/view', [Admin\SubscriptionManagementController::class, 'view']);
    });

    Route::group(['prefix' => 'constants'], function () {

        Route::get('/interests', [Admin\InterestController::class, 'index']);
        Route::get('/interest-data', [Admin\InterestController::class, 'anyData']);
        Route::get('/interest-create', [Admin\InterestController::class, 'create']);
        Route::post('/interest-create', [Admin\InterestController::class, 'store']);
        Route::get('/interest-edit/{id}', [Admin\InterestController::class, 'edit']);
        Route::put('/interest-edit/{id}', [Admin\InterestController::class, 'update']);
        Route::delete('/interest/{id}', [Admin\InterestController::class, 'delete']);

        Route::get('/hobbies', [Admin\HobbyController::class, 'index']);
        Route::get('/hobby-data', [Admin\HobbyController::class, 'anyData']);
        Route::get('/hobby-create', [Admin\HobbyController::class, 'create']);
        Route::post('/hobby-create', [Admin\HobbyController::class, 'store']);
        Route::get('/hobby-edit/{id}', [Admin\HobbyController::class, 'edit']);
        Route::put('/hobby-edit/{id}', [Admin\HobbyController::class, 'update']);
        Route::delete('/hobby/{id}', [Admin\HobbyController::class, 'delete']);


        Route::get('/religions', [Admin\ReligionController::class, 'index']);
        Route::get('/religion-data', [Admin\ReligionController::class, 'anyData']);
        Route::get('/religion-create', [Admin\ReligionController::class, 'create']);
        Route::post('/religion-create', [Admin\ReligionController::class, 'store']);
        Route::get('/religion-edit/{id}', [Admin\ReligionController::class, 'edit']);
        Route::put('/religion-edit/{id}', [Admin\ReligionController::class, 'update']);
        Route::delete('/religion/{id}', [Admin\ReligionController::class, 'delete']);


        Route::get('/countries', [Admin\CountryController::class, 'index']);
        Route::get('/country-data', [Admin\CountryController::class, 'anyData']);
        Route::get('/country-create', [Admin\CountryController::class, 'create']);
        Route::post('/country-create', [Admin\CountryController::class, 'store']);
        Route::get('/country-edit/{id}', [Admin\CountryController::class, 'edit']);
        Route::put('/country-edit/{id}', [Admin\CountryController::class, 'update']);
        Route::delete('/country/{id}', [Admin\CountryController::class, 'delete']);

        Route::get('/cities', [Admin\CityController::class, 'index']);
        Route::get('/city-data', [Admin\CityController::class, 'anyData']);
        Route::get('/city-create', [Admin\CityController::class, 'create']);
        Route::post('/city-create', [Admin\CityController::class, 'store']);
        Route::get('/city-edit/{id}', [Admin\CityController::class, 'edit']);
        Route::put('/city-edit/{id}', [Admin\CityController::class, 'update']);
        Route::delete('/city/{id}', [Admin\CityController::class, 'delete']);


        Route::get('/subscriptions', [Admin\SubscriptionController::class, 'index']);
        Route::get('/subscription-data', [Admin\SubscriptionController::class, 'anyData']);
        Route::get('/subscription-create', [Admin\SubscriptionController::class, 'create']);
        Route::post('/subscription-create', [Admin\SubscriptionController::class, 'store']);
        Route::get('/subscription-edit/{id}', [Admin\SubscriptionController::class, 'edit']);
        Route::put('/subscription-edit/{id}', [Admin\SubscriptionController::class, 'update']);
        Route::delete('/subscription/{id}', [Admin\SubscriptionController::class, 'delete']);


    });
    Route::group(['prefix' => 'web'], function () {
        Route::get('/features', [Admin\AmazingFeatureController::class, 'index']);
        Route::get('/feature-data', [Admin\AmazingFeatureController::class, 'anyData']);
        Route::get('/feature-create', [Admin\AmazingFeatureController::class, 'create']);
        Route::post('/feature-create', [Admin\AmazingFeatureController::class, 'store']);
        Route::get('/feature-edit/{id}', [Admin\AmazingFeatureController::class, 'edit']);
        Route::put('/feature-edit/{id}', [Admin\AmazingFeatureController::class, 'update']);
        Route::delete('/feature/{id}', [Admin\AmazingFeatureController::class, 'delete']);

        Route::get('/stories', [Admin\StoryController::class, 'index']);
        Route::get('/story-data', [Admin\StoryController::class, 'anyData']);
        Route::get('/story-create', [Admin\StoryController::class, 'create']);
        Route::post('/story-create', [Admin\StoryController::class, 'store']);
        Route::get('/story-edit/{id}', [Admin\StoryController::class, 'edit']);
        Route::put('/story-edit/{id}', [Admin\StoryController::class, 'update']);
        Route::delete('/story/{id}', [Admin\StoryController::class, 'delete']);

        Route::get('/media', [Admin\MediaController::class, 'index']);
        Route::get('/media-data', [Admin\MediaController::class, 'anyData']);
        Route::get('/media-create', [Admin\MediaController::class, 'create']);
        Route::post('/media-create', [Admin\MediaController::class, 'store']);
        Route::get('/media-edit/{id}', [Admin\MediaController::class, 'edit']);
        Route::put('/media-edit/{id}', [Admin\MediaController::class, 'update']);
        Route::delete('/media/{id}', [Admin\MediaController::class, 'delete']);

        Route::get('/questions', [Admin\FaqsController::class, 'index']);
        Route::get('/questions-data', [Admin\FaqsController::class, 'anyData']);
        Route::get('/questions-create', [Admin\FaqsController::class, 'create']);
        Route::post('/questions-create', [Admin\FaqsController::class, 'store']);
        Route::get('/questions-edit/{id}', [Admin\FaqsController::class, 'edit']);
        Route::put('/questions-edit/{id}', [Admin\FaqsController::class, 'update']);
        Route::delete('/questions/{id}', [Admin\FaqsController::class, 'delete']);

        Route::get('/answers', [Admin\AnswersController::class, 'index']);
        Route::get('/answers-data', [Admin\AnswersController::class, 'anyData']);
        Route::get('/answers-create', [Admin\AnswersController::class, 'create']);
        Route::post('/answers-create', [Admin\AnswersController::class, 'store']);
        Route::get('/answers-edit/{id}', [Admin\AnswersController::class, 'edit']);
        Route::put('/answers-edit/{id}', [Admin\AnswersController::class, 'update']);
        Route::delete('/answers/{id}', [Admin\AnswersController::class, 'delete']);


        Route::get('/settings-edit', [Admin\SettingsController::class, 'edit']);
        Route::put('/settings-edit', [Admin\SettingsController::class, 'update']);


    });
    Route::group(['prefix' => 'contactus'], function () {
        Route::get('/', [Admin\ContactController::class, 'index']);
        Route::get('/contact-data', [Admin\ContactController::class, 'anyData']);
        Route::delete('/{id}', [Admin\ContactController::class, 'delete']);


    });


});



