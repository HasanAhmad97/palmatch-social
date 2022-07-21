<?php

namespace App\Http\Controllers\Site;

use App\AmazingFeature;
use App\Country;
use App\Hobby;
use App\Http\Controllers\Controller;
use App\Interest;
use App\Religion;
use App\Setting;
use App\Story;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $settings = Setting::with('translationAll')->first();

        $countries = Country::with('translationAll')->get();
        $amazings = AmazingFeature::with('translationAll')->get();
        $stories = Story::with('translationAll')->get();

        $men = User::where(['is_publish' => 1, 'is_complete'=> 1, 'gender' => 'male'])->count();
        $wemon = User::where(['is_publish' => 1, 'is_complete' => 1, 'gender' => 'female'])->count();       
        $counters['men'] = $men+100;
        $counters['women'] = $wemon+100;
        // $counters['all'] = User::where(['is_complete' => 1])->count();
        
        if(auth()->check())
            $last_reg = User::where(['is_complete' => 1])->where('id','!=',auth()->user()->id)->orderBy('created_at','desc')->limit(9)->get();
        else
            $last_reg = User::where(['is_complete' => 1])->orderBy('created_at','desc')->limit(9)->get();

        // $counters = User::select(array(
        //     \DB::raw(
        //     "COUNT(CASE WHEN gender = 'male' THEN * ELSE *) as men"),
        //     \DB::raw(
        //     "COUNT(CASE WHEN gender = 'female' THEN * ELSE *)  as women")
        // ))->get();

        $data = [
            'last_reg' => $last_reg,
            'counters' => $counters,
            'settings' => $settings,
            'countries' => $countries,
            'amazings' => $amazings,
            'stories' => $stories,
        ];

        return response()->json($data);
    }

    public function register()
    {
        $data = [
            'countries' => Country::with('translationAll')->get(),
            'hobbies' => Hobby::with('translationAll')->get(),
            'interests' => Interest::with('translationAll')->get(),
            'religions' => Religion::with('translationAll')->get(),
        ];
        return response()->json($data);
    }

    public function likes()
    {
        return view('site.likes');
    }

    public function profile()
    {
        $countries = Country::all();
        $religions = Religion::all();
        $data = [
            'title' => 'Edit Profile',
            'countries' => $countries,
            'religions' => $religions,
        ];
        return view('site.profile', $data);
    }

    public function chat()
    {
        return view('site.chats');
    }

    public function discover()
    {
        return view('site.discover');
    }

    public function forget()
    {
        $data = [
            'title' => 'Forget Password'
        ];
        return view('site.forget', $data);
    }

    public function resetPassword()
    {
        $data = [
            'title' => 'Reset Password'
        ];
        return view('site.change_password', $data);
    }

    public function search()
    {
        $data = [
        ];
        return view('site.search', $data);
    }


    public function contactUs()
    {
        $data = [
            'title' => 'Contact Us'
        ];
        return view('site.contactus', $data);
    }

    public function chatRequests()
    {
        $data = [
        ];
        return view('site.chat_requests', $data);
    }

    public function langData()
    {
        $data['current_lang'] = session()->get('locale') != null ? session()->get('locale') : 'en';

        $data['languages'] = config('languages.name');

        return response()->json($data);
    }

    public function getContent($title){
        $settings = Setting::with('translationAll')->first();
        return response()->json($settings);
       
    }
}
