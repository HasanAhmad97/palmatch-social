<?php


namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Repositories\Eloquents\UserEloquent;
use JWTAuth;
use App\UserSubscription;

class SocialController extends Controller
{

    public function __construct(UserEloquent $user)
    {
        $this->user = $user;
    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function redirectToFacebook() {

        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function callbackFacebook(){

        try {
            $provider = 'facebook';
            $userInfo = Socialite::driver($provider)->stateless()->user();
            $userSystem = User::where(['email' => $userInfo->email])->first();
            if(!is_null($userSystem)) {

                $userSystem->provider=$provider;
                $userSystem->provider_id=$userInfo->id;
                $userSystem->save();
            }else{
                $userSystem = User::create([
                    'name' => $userInfo->name,
                    'email' => $userInfo->email,
                    'provider' => $provider,
                    'provider_id' => $userInfo->id,
                ]);
                if ($userSystem) 
                    $UserSubscription = UserSubscription::create([
                        'user_id' => $userSystem->id,
                        'subscription_id' => 1,
                    ]);


            }
            $user = JWTAuth::fromUser($userSystem);
            return redirect('index.html/#home?user='.$user);
        }
        catch(\Exception $e) {
            return redirect('index.html/#home');
        }
    }

    public function callbackGoogle(){

        $provider = 'google';

        $userInfo = Socialite::driver($provider)->stateless()->user();

        $userSystem = User::where(['email' => $userInfo->email])->first();
        if(!is_null($userSystem)) {

            $userSystem->provider=$provider;
            $userSystem->provider_id=$userInfo->id;
            $userSystem->save();
        }else{
            $userSystem = User::create([
                'name' => $userInfo->name,
                'email' => $userInfo->email,
                'provider' => $provider,
                'provider_id' => $userInfo->id,
            ]);

            if ($userSystem) 
                $UserSubscription = UserSubscription::create([
                    'user_id' => $userSystem->id,
                    'subscription_id' => 1,
                ]);

        }
        $user = JWTAuth::fromUser($userSystem);
        return redirect('index.html/#home?user='.$user);
    }
}
