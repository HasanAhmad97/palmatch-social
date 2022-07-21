<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\User;
use App\View;
use App\UserHobby;
use App\UserSocialMedia;
use App\UserGallery;
use App\Like;
use App\Chat;
use App\Country;
use App\City;
use App\Hobby;
use App\Interest;
use App\Religion;
use App\UserInterest;
use App\SocialMedia;
use App\ContactUs;
use App\EmailsSubscription;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\CountrySubscription;
use App\Subscription;
use App\UserSubscription;
use App\Question;
use Auth;

class UserEloquent extends Uploader implements Repository
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->filter(function ($query) {

                if (request()->filled('name')) {
                    $query->where('name', 'LIKE', '%' . request()->get('name') . '%');
                }

                if (request()->filled('email')) {
                    $query->where('email', 'LIKE', '%' . request()->get('email') . '%');
                }

                if (request()->filled('phone')) {
                    $query->where('phone', 'LIKE', '%' . request()->get('phone') . '%');
                }

                if (request()->filled('gender')) {
                    $query->where('gender', request()->get('gender'));
                }
                if (request()->filled('country_id')) {
                    $query->where('country_id', request()->get('country_id'));
                }
                if (request()->filled('is_active')) {
                    $query->where('is_active', request()->get('is_active'));
                }
            })
            ->editColumn('photo', function ($item) {

                if (isset($item->photo))
                    return '<img src="' . $item->photo . '" width="80px" height="80px" class="img-circle">';
            })->addColumn('country_name', function ($item) {

                return isset($item->Country) ? $item->Country->translation()->name : '-';
            })->editColumn('gender', function ($item) {

                return ucfirst($item->gender);
            })->editColumn('is_online', function ($item) {
                if ($item->is_online)
                    return '<span class="label label-success">Online</span>';
                return '<span class="label label-danger">Offline</span>';
            })->editColumn('is_active', function ($item) {
                if ($item->is_active)
                    return '<input type="checkbox" class="make-switch is_active" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_active" data-id="' . $item->id . '" checked  data-on-color="success" data-size="mini" data-off-color="warning">';
                return '<input type="checkbox" class="make-switch is_active" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_active" data-id="' . $item->id . '" data-on-color="success" data-size="mini" data-off-color="warning">';
            })->editColumn('is_publish', function ($item) {
                if ($item->is_publish)
                    return '<input type="checkbox" class="make-switch is_publish" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_publish" data-id="' . $item->id . '" checked  data-on-color="success" data-size="mini" data-off-color="warning">';
                return '<input type="checkbox" class="make-switch is_publish" data-on-text="&nbsp;ON&nbsp;" data-off-text="&nbsp;OFF&nbsp;" name="is_publish" data-id="' . $item->id . '" data-on-color="success" data-size="mini" data-off-color="warning">';
            })->addColumn('action', function ($item) {
                return '<a href="' . url('/admin/users/' . $item->id . '/view') . '" class="btn btn-circle btn-icon-only blue">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    ';
            })->addIndexColumn()
            ->rawColumns(['is_online', 'is_active', 'is_publish', 'photo', 'action'])->toJson();
    }

    function getAll(array $attributes)
    {
        // TODO: Implement getAll() method.
        $data = $this->model->all();
        if (request()->segment(1) == 'api') {
            return response_api(true, 200, null, $data);
        }
        return $data;
    }


    function userActive($id)
    {

        $user = $this->model->find($id['user_id']);

        if (isset($user)) {
            $user->is_active = !$user->is_active;
            if ($user->save())
                return response_api(true, 200);
        }
        return response_api(false, 422);

    }

    function userPublish($id)
    {

        $user = $this->model->find($id['user_id']);

        if (isset($user)) {
            $user->is_publish = !$user->is_publish;
            if ($user->save())
                return response_api(true, 200);
        }
        return response_api(false, 422);

    }

    function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->model->find($id);
    }

    function profileData($id)
    {
        if(auth()->check() && (auth()->user()->id != $id)){
            $viewer = View::where([
                'user_id' => $id,
                'viewer' => auth()->user()->id,
            ])->first();
            
            if(!$viewer)
                View::create([
                    'user_id' => $id,
                    'viewer' => auth()->user()->id,
                ]);
        }

        $user_profile['data'] = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'UserGallery', 'UserSocialMedia.SocialMedia', 'Interests.Interest.translationAll'])->where('id', $id)->first();

        return response()->json($user_profile);
    }

    function AuthProfileData()
    {
        $id = auth()->user()->id;

        $user_profile['data'] = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'UserGallery', 'UserSocialMedia.SocialMedia', 'Interests.Interest.translationAll'])->where('id', $id)->first();

        return response()->json($user_profile);
    }

    function editprofile()
    {
        $id = auth()->user()->id;
        $interests = Interest::with('translationAll')->get();
        $interests->map(function ($interest) use ($id){
            if(UserInterest::where(['user_id'=>$id,'interest_id'=>$interest->id])->first())
                $interest->select = true;
            return $interest;
        });

        $hobbies = Hobby::with('translationAll')->get();
        $hobbies->map(function ($hobby) use ($id){
            if(UserHobby::where(['user_id'=>$id,'hobby_id'=>$hobby->id])->first())
                $hobby->select = true;
            return $hobby;
        });

        

        $response['data'] = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'UserGallery', 'UserSocialMedia.SocialMedia', 'Interests.Interest.translationAll'])->where('id', $id)->first();

        $response['options'] = [
            'countries' => Country::with('translationAll')->get(),
            'cities' => City::with('translationAll')->where('country_id',$response['data']['Country']->id)->get(),
            'hobbies' => $hobbies,
            'interests' => $interests,
            'social_links' => SocialMedia::doesntHave('UserSocialMedia')->get(),
            'religions' => Religion::with('translationAll')->get(),
        ];

        return response()->json($response);
    }

    function editprofileData($attributes)
    {
        $model = auth()->user();
        $model->gender = $attributes['gender'];
        $model->education = $attributes['education'];
        $model->country_id = isset($attributes['country_id']) ? $attributes['country_id'] : null;
        $model->city_id = isset($attributes['city_id']) ? $attributes['city_id'] : null;
        $model->religion_id = isset($attributes['religion_id']) && !empty($attributes['religion_id']) && ($attributes['religion_id'] != "null") ? $attributes['religion_id'] : null;
        $model->phone = $attributes['phone'];
        $model->name = $attributes['name'];
        $model->dob = \DateTime::createFromFormat('D M d Y H:i:s e+', $attributes['dob']);
        $model->bio = isset($attributes['bio']) ? $attributes['bio'] : '';
        $model->is_complete = 1;
        if ($model->save()) {

            if (isset($attributes['photo'])) {
                $model->photo = $this->storeImageThumb_('users', $model->id, $attributes['photo'],'avatar');
                $model->save();
            }
            if (isset($attributes['cover'])) {
                $model->cover = $this->storeImageThumb_('users', $model->id, $attributes['cover'],'cover');

                $model->save();
            }
            if (isset($attributes['hobbies'])) {
                $hobbies = array_map('intval', explode(',', $attributes['hobbies']));
                UserHobby::where('user_id',auth()->user()->id)->forceDelete();
                foreach ($hobbies as $hobby_id) {
                    UserHobby::create([
                        'user_id' => auth()->user()->id,
                        'hobby_id' => $hobby_id,
                    ]);
                }
            }
            if (isset($attributes['interests'])) {
                $interests = array_map('intval', explode(',', $attributes['interests']));
                UserInterest::where('user_id',auth()->user()->id)->forceDelete();
                foreach ($interests as $interest_id) {
                    UserInterest::create([
                        'user_id' => auth()->user()->id,
                        'interest_id' => $interest_id,
                    ]);

                }
            }

            if (isset($attributes['social_links'])) {
                $social_links = json_decode($attributes['social_links']);
                UserSocialMedia::where('user_id',auth()->user()->id)->forceDelete();
                foreach ($social_links as $social_id) {
                    UserSocialMedia::create([
                        'user_id' => auth()->user()->id,
                        'social_id' => $social_id->social_id,
                        'link' =>  $social_id->link,
                    ]);

                }
            }
            return response()->json(['status' => true,'user' => $model]);
        }
        return response()->json(['status' => false]);

    }

    public function getCities($id){
        $response['cities']  = City::with('translationAll')->where('country_id',$id)->get();
        return response()->json($response);
    }

    function addGalleryPhoto($images)
    {   
        $Subscription = new Subscription();
        $privilige =  $Subscription->subscriptionPermission([3,4,5,6]);
        $pricture_count = 0;
        if(isset($privilige->planPrivilegs)) {
            $privilige_id = $privilige->planPrivilegs->privilege_id;
            if($privilige_id == 3)
                $pricture_count = 10;
            elseif($privilige_id == 4)
                $pricture_count = 15;
            elseif($privilige_id == 6)
                $pricture_count = 5;
        }
        $user_images = UserGallery::where('user_id',auth()->user()->id)->count();

        if (isset($images)) {
            $i=0;
            foreach ($images as $image) {
                if($pricture_count > $user_images || $privilige_id == 5){
                    $gallary_img = $this->storeImageThumb_('users',auth()->user()->id, $image,'gallary');
                    $photo = UserGallery::create([
                        'user_id' => auth()->user()->id,
                        'image' => $gallary_img
                    ]);
                }else{
                    $gallary_imgs = UserGallery::where('user_id',auth()->user()->id)->get();
                    return response()->json(['status' => false,'msg'=>trans('app.did_not_upload_all_images_in_gallary'),'gallary_imgs'=>$gallary_imgs ]);
                }
                $user_images++;
                $i++;
            }
        }
        $gallary_imgs = UserGallery::where('user_id',auth()->user()->id)->get();
        return response()->json(['status' => true,'gallary_imgs'=>$gallary_imgs ]);
    }

    function deleteGalleryPhoto($id)
    {
         $blog = UserGallery::find($id);

        if (isset($blog) && $blog->delete())
            return response_api(true, 200, trans('app.success'), []);
        return response_api(false, 422, trans('app.error'), []);
    }


    function addChannel($attributes)
    {

        $channel_ = Chat::where([
            'user_id_one' => $attributes->user_id_two,
            'user_id_two' => $attributes->user_id_one,
        ])->orWhere(function ($query) use($attributes) {
            $query->where([
            'user_id_one' => $attributes->user_id_one,
            'user_id_two' => $attributes->user_id_two,
            ]);
        })->first();


        if(!$channel_){
            $Subscription = new Subscription();
            $privilige =  $Subscription->subscriptionPermission([1,2]);
            $channel_count = 0;
            if(isset($privilige->planPrivilegs)) {
                $privilige_id = $privilige->planPrivilegs->privilege_id;
                if($privilige_id == 1)
                    $channel_count = 10;
                elseif ($privilige_id == 2) {
                    $channel_count = 'unlimit';
                }
            }
            
            $channels = Chat::where(['user_id_one'=> auth()->user()->id])->whereDate('created_at', Carbon::today())->count();
            if($channels < $channel_count  || $channel_count == 'unlimit'){
                $channel['data'] = Chat::create([
                    'user_id_one' => $attributes->user_id_one,
                    'user_id_two' => $attributes->user_id_two,
                ]);
                $channel['status'] = true;
            }else{
                return response()->json(['status' => false,'msg'=>trans('app.you_cant_add_another_chat')]);

            }
        }else{
            $channel['status'] = false;
            $channel['data'] = $channel_;
        }

        return response()->json($channel);
    }

    function deleteChannel($attributes)
    {

        $channel_ = Chat::where([
            'user_id_one' => $attributes->user_id_two,
            'user_id_two' => $attributes->user_id_one,
        ])->orWhere(function ($query) use($attributes) {
            $query->where([
            'user_id_one' => $attributes->user_id_one,
                'user_id_two' => $attributes->user_id_two,
            ]);
        })->forceDelete();

        return response()->json($channel_);
    }

    function addContact($attributes)
    {
        $contact = ContactUs::create([
            'name' => $attributes->name,
            'email' => $attributes->email,
            'description' => $attributes->description,
        ]);
       
        if($contact)
            return response_api(true, 200, trans('app.success'), []);
        
        return response_api(false, 422, trans('app.error'), []);
    }

    function chats()
    {
        $suggest_users = Chat::with(['User2'])->where('user_id_one',auth()->user()->id)->orWhere('user_id_two',auth()->user()->id)->get();

        return response()->json($suggest_users);
    }

    function getChannel($reciver_id)
    {
       
        $reciver = User::find($reciver_id);

        return response()->json(['status' => true,'reciver'=> $reciver]);


    }

    function login(array $attributes)
    {
        if ($token = auth()->attempt(['email' => $attributes['email'], 'password' => $attributes['password']])) {
            $user = auth()->user();
            $user_info = User::where('id', $user->id)->first();
            $user_info->is_online = 1;
            $user_info->save();
            return response()->json(['status' => true, 'user' => $user_info,
            'token' => $token,
            'token_type' => 'bearer'
            ,'expires_in' => auth()->factory()->getTTL() * 60
        ]);
        }
        return response()->json(['status' => false, 'msg' => __('auth.failed_user_pass')]);
    }

    function logout()
    {   
        $user = auth()->user();
        $user_info = User::where('id', $user->id)->first();
        $user_info->is_online = 0;
        $user_info->save();
        auth()->logout();

        return response()->json(['status' => true]);
    }

    public function forgetPassword($options)
    {

        $user = User::where('email', $options['email'])->first();

        if (!$user) {
            return response()->json(['msg' => __('passwords.user'), 'status' => false]);
        }
        $token = Str::random(32);;
        \DB::table('password_resets')->insert([
            'email' => $options['email'],
            'token' => $token,
        ]);

        $baseUrl = explode("forgetPassword", url()->current())[0];

        $link = $baseUrl . '#/resetPassword?token=' . $token;

        $from = 'info@palmatch.net';
        $MAIL_USER_NAME = 'Pal Match Support';
        $to = $options['email'];
        $title = "Pal Match Reset Password Link";
        $mail = Mail::send('emails.sent', ['title' => $title, 'content' => $link], function ($msg) use ($to, $from, $title, $MAIL_USER_NAME) {
            $msg->from($from, $MAIL_USER_NAME)->to($to)->subject($title);
        });

        return response()->json(['msg' => __('passwords.sent'), 'status' => true]);
    }

    public function resetPassword($options)
    {
        $user = auth()->user();
         if($options['password'] != $options['confirm_password']){
            return response()->json(['msg' => __('passwords.confirm_not_equal'), 'status' => false]);
        }else {
            $password = $options['password'];
            if (isset($options['token'])) {
                $tokenData = \DB::table('password_resets')->where('token', $options['token'])->first();
                if ($tokenData) {
                    $user = User::where('email', $tokenData->email)->first();
                    if ($user) {
                        $user->password = \Hash::make($password);
                        if ($user->save()) {
                            return response()->json(['msg' => __('passwords.reset'), 'status' => true]);
                        }
                    }
                }
            }else if($user) {
                if (\Hash::check($options['old_password'], $user->password)) { 
                    $user->password = \Hash::make($password);
                    if ($user->save()) {
                        return response()->json(['msg' => __('passwords.reset'), 'status' => true]);
                    }
                }else{
                    return response()->json(['msg' => __('passwords.old_password_not_equal_user_password'), 'status' => false]);
                }
            }
        }
        return response()->json(['msg' => __('passwords.throttled'), 'status' => false]);

    }
    public function addSubscription($options)
    {
        $exitsEmail = EmailsSubscription::where('email',$options['email'])->first();
        if(!$exitsEmail){
            $save = EmailsSubscription::create([
                'email' => $options['email'], 
            ]);
            if ($save) {
                return response()->json(['status' => true, 'msg' => trans('app.success')]);
            }
        }
        return response()->json(['status' => false, 'msg' => trans('app.error')]);
    }

    function completeProfile(array $attributes)
    {
        // TODO: Implement create() method.
        $model = auth()->user();
        $model->gender = $attributes['gender'];
        $model->education = $attributes['education'];
        $model->country_id = isset($attributes['country_id']) ? $attributes['country_id'] : null;
        // $model->religion_id = $attributes['religion_id'];
        $model->phone = $attributes['phone'];
        $model->dob = \DateTime::createFromFormat('D M d Y H:i:s e+', $attributes['dob']);
        $model->bio = isset($attributes['bio']) ? $attributes['bio'] : '';
        $model->is_complete = 1;
        if ($model->save()) {

            if (isset($attributes['photo'])) {
                $model->photo = $this->storeImageThumb_('users', $model->id, $attributes['photo'],'avatar');
                $model->save();
            }
            if (isset($attributes['cover'])) {
                $model->cover = $this->storeImageThumb_('users', $model->id, $attributes['cover'],'cover');
                $model->save();
            }
            if (isset($attributes['hobby_id'])) {
                $hobbies = array_map('intval', explode(',', $attributes['hobby_id']));
                foreach ($hobbies as $hobby_id) {
                    UserHobby::create([
                        'user_id' => auth()->user()->id,
                        'hobby_id' => $hobby_id,
                    ]);

                }
            }
            if (isset($attributes['interest_id'])) {
                $interests = array_map('intval', explode(',', $attributes['interest_id']));

                foreach ($interests as $interest_id) {
                    UserInterest::create([
                        'user_id' => auth()->user()->id,
                        'interest_id' => $interest_id,
                    ]);

                }
            }
            return response()->json(['status' => true,'user' => $model]);
        }
        return response()->json(['status' => false]);
    }

    function create(array $attributes)
    {
        
    // TODO: Implement create() method.
        $attributes['password'] = \Hash::make($attributes['password']);
        $user = User::create($attributes);
        if ($user) {
            $UserSubscription = UserSubscription::create([
                'user_id' => $user->id,
                'subscription_id' => 1,
            ]);
            // if ($token = auth()->attempt(['email' => $attributes['email'], 'password' => $attributes['password']])) {
            //     $user = auth()->user();
            //     $user_info = User::where('id', $user->id)->first();
            //     $user_info->is_online = 1;
            //     $user_info->save();
            //     $response = [
            //         'user' => $user_info,
            //         'token' => $token,
            //         'token_type' => 'bearer',
            //         'expires_in' => auth()->factory()->getTTL() * 60
            //     ];
            // }

            return response()->json(['status' => true, 'msg' => trans('app.success')
                // ,'user' => $response
            ]);
        }
        return response()->json(['status' => false, 'msg' => trans('app.error')]);
    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
        $blog = $this->model->find($id);
        if (isset($attributes['title']))
            $blog->title = $attributes['title'];
        if (isset($attributes['content']))
            $blog->content = $attributes['content'];
        if (isset($attributes['image']))
            $blog->image = $this->upload($attributes, 'image');

        if ($blog->save())
            return response_api(true, 200, trans('app.success'), $blog);
        return response_api(false, 422, trans('app.error'));


    }

    function delete($id)
    {
        // TODO: Implement delete() method.
        $blog = $this->model->find($id);

        if (isset($blog) && $blog->delete())
            return response_api(true, 200, trans('app.success'), []);
        return response_api(false, 422, trans('app.error'), []);

    }

    public function isAuthenticate()
    {
        if (auth()->check()) {
            if(auth()->user()->is_active){
                $user = auth()->user();

                $is_user_subscribe = UserSubscription::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->first();
                if($is_user_subscribe)
                    $is_finished_subscribtion = $is_user_subscribe->is_finished_subscribtion;
                else
                    $is_finished_subscribtion = false;

                return response()->json(['status' => true, 'user' => $user,'is_finished_subscribtion'=>$is_finished_subscribtion]);
            }else{
                auth()->logout();
                return response()->json(['status' => false, 'message' => '']); 
            }
        }
        return response()->json(['status' => false, 'message' => '']);
    }

    public static function filterData($options)
    {
        $users = User::with('Country.translationAll');
        if (isset($options['sortByText']) && !empty($options['sortByText']) ) {
            if ($options['sortby'] == 'Name')
                $users->where('name', 'like', '%' . $options['sortByText'] . '%');
            elseif ($options['sortby'] == 'Education')
                $users->where('education', 'like', '%' . $options['sortByText'] . '%');
        }

        if (isset($options['country_id'])) {
            $users->where('country_id', $options['country_id']);
        }
        if (isset($options['gender'])) {
            $users->where('gender', $options['gender']);
        }
        if (isset($options['religion_id'])) {
            $users->where('religion_id', $options['religion_id']);
        }
        if (isset($options['interest_id'])) {
            $users->whereHas('Interests', function ($q) use ($options) {
                $q->where('interest_id', $options['interest_id']);
            });
        }
        if (isset($options['hobby_id'])) {
            $users->whereHas('Hobbies', function ($q) use ($options) {
                $q->where('hobby_id', $options['hobby_id']);
            });
        }

        $users->where('id', '!=', auth()->user()->id)->where(['is_complete'=> 1,'is_publish'=>1]);

        $users->orderBy('created_at','desc');

        if (isset($options['age_from']) && isset($options['age_to'])) {
            $users = $users->get();
            $users = $users->whereBetween('age', [$options['age_from'], $options['age_to']]);
            $response['data'] = $users;
        }else{
            $response = $users->paginate(9);
        }

        return response()->json($response);



    }

    public static function filterDiscover($options)
    {
        $user = auth()->user();
        $user_id = $user->id;
        $response =['suggests'=>[],'user_Interests'=>[],'user_hobbies'=>[]];
// dd($options['gender']);

        $users = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'Interests.Interest.translationAll'])->where('id','!=',$user->id)->where(['is_complete'=> 1,'is_publish'=>1]);

        
        if (isset($options['country_id']) && !empty($options['country_id'])) {
            $users = $users->where('country_id', $options['country_id']);
        }
        if (isset($options['gender']) && !empty($options['gender'])) {
            $users = $users->where('gender', $options['gender']);
        }else{
            if($user->gender == 'male')
                $users = $users->where('gender', 'female');
            elseif($user->gender == 'female')
                $users = $users->where('gender', 'male');

        }

        $users = $users->orderBy('created_at','desc')->get();

        if (isset($options['age_from']) && isset($options['age_to'])) {
            $users = $users->whereBetween('age', [$options['age_from'], $options['age_to']]);
        }

        $users->map(function ($userr) use (&$response,$user){

            if($userr->country_id == $user->country_id){
                $userr->suitable_count = $userr->suitable_count + 1;
            }
            if($userr->religion_id == $user->religion_id){
                $userr->suitable_count = $userr->suitable_count + 1;
            }

            $user_hobbies = User::WhereHas('Hobbies.UserHobby', function($k) use ($user) {
                $k->where('user_id', $user->id);
            })->where('id',$userr->id)->count();

            if($user_hobbies>0){
                $userr->suitable_count = $userr->suitable_count + 1;
                if(count($response['user_hobbies'])<6)
                    $response['user_hobbies'][] =  $userr;
            }

            $user_interests = User::WhereHas('Interests.UserInterest', function($k) use ($user) {
                $k->where('user_id', $user->id);
            })->where('id',$userr->id)->count();

            if($user_interests>0){
                $userr->suitable_count = $userr->suitable_count + 1;
                if(count($response['user_Interests'])<4)
                    $response['user_Interests'][] =  $userr;
            }

            //suggests_users
                if($userr->suitable_count > 0 && count($response['suggests'])<6){
                    $response['suggests'][] =  $userr;
                }

            return $userr;
        });
        //suitable_user
            $response['suitable_user'] = $users->sortByDesc("suitable_count")->first();

        //random_user
            $range = rand(0, count($users)-1);
            if($range)
                $response['random_user'] =  $users[$range] ;

        //new_registers
            $response['new_registers'] = $users->take(6);


        return response()->json($response);

    }

    public static function detailsDiscover($options)
    {
        $user = auth()->user();
        $response =[];
        $revers_male = $user->gender =='male'?'female':'male';
        $auth_users = User::with(['Hobbies', 'Interests'])->where('id',$user->id)->where(['is_complete'=> 1,'is_publish'=>1])->first();
       
        $users = User::with(['Country.translationAll', 'Religion.translationAll', 'Hobbies.Hobby.translationAll', 'Interests.Interest.translationAll'])->where(['is_complete'=> 1,'is_publish'=>1])->where('id','!=',$user->id);

        if($options['details'] == "suggests"){
            $users->where(function($q) use ($auth_users) {
            $hobbies_ids =[];
            foreach ($auth_users['hobbies'] as $key => $value) {
                $hobbies_ids[] = $value['hobby_id'];
            }
            $q->where('country_id', $auth_users['country_id'])
              ->orWhere('religion_id', $auth_users['religion_id'])->orWhereHas('hobbies', function ($q) use ($hobbies_ids) {
                    $q->whereIn('hobby_id',$hobbies_ids);
                });
            });   

        }

        if($options['details'] == "user_Interests"){
            $interests_ids =[];
            foreach ($auth_users['interests'] as $key => $value) {
                $interests_ids[] = $value['interest_id'];
            }
            $users->WhereHas('Interests', function ($q) use ($interests_ids) {
                $q->whereIn('interest_id',$interests_ids);
            });   
        }

            
        if (isset($options['sortByText'])) {
            if ($options['sortby'] == 'Name')
                $users->where('name', 'like', '%' . $options['sortByText'] . '%');
            elseif ($options['sortby'] == 'Education')
                $users->where('education', 'like', '%' . $options['sortByText'] . '%');
        }

        if (isset($options['country_id'])) {
            $users = $users->where('country_id', $options['country_id']);
        }
        if (isset($options['gender'])) {
            $users = $users->where('gender', $options['gender']);
        }else{
            $users = $users->where('gender',$revers_male);
        }

        if (isset($options['religion_id'])) {
            $users->where('religion_id', $options['religion_id']);
        }
        if (isset($options['interest_id'])) {
            $users->whereHas('Interests', function ($q) use ($options) {
                $q->where('interest_id', $options['interest_id']);
            });
        }
        if (isset($options['hobby_id'])) {
            $users->whereHas('Hobbies', function ($q) use ($options) {
                $q->where('hobby_id', $options['hobby_id']);
            });
        }


        $users->orderBy('created_at','desc');

        if (isset($options['age_from']) && isset($options['age_to'])) {
            $users = $users->get();
            $users = $users->whereBetween('age', [$options['age_from'], $options['age_to']]);
            $response['data'] = $users;
        }else{
            $response = $users->paginate(9);
        }
 
        return response()->json($response);

    }
    public static function likeUser($options)
    {
        $like = Like::where(['user_id' => auth()->user()->id, 'user_like_id' => $options['user_like_id']])->first();
        if (isset($like)) {
            $like->forceDelete();
            $is_like = 0;
        } else {
            like::create([
                'user_id' => auth()->user()->id,
                'user_like_id' => $options['user_like_id'],
            ]);
            $is_like = 1;
        }

        return response()->json(['status' => true, 'is_like' => $is_like]);

    }

    public static function userLikes()
    {
        $user = auth()->user();
        $users = User::with('Likes.User.Country.translationAll')->whereHas('Likes', function ($q) use ($user) {
            $q->where(['user_id' => $user->id]);
        });

        return response()->json($users->get());

    }

    public static function usersView()
    {
        $user = auth()->user();
        $users = User::with('Viewers.User.Country.translationAll')->whereHas('Viewers', function ($q) use ($user) {
            $q->where(['user_id' => $user->id]);
        });

        return response()->json($users->get());

    }

    function subscriptions()
    {
        $is_user_subscribe = UserSubscription::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->first();
        if($is_user_subscribe)
            $user_subscribe = $is_user_subscribe;
        else
            $user_subscribe = false;

        $subscriptions = Subscription::with(['translationAll'])->get();
        $response['subscriptions'] = $subscriptions;
        $response['user_subscribe'] = $user_subscribe;
        return response()->json($response);
    }
    function userSubscribe($subscription_id)
    {
        
        $UserSubscription = UserSubscription::create([
            'user_id' => auth()->user()->id,
            'subscription_id' => $subscription_id,
        ]);
        
        if($UserSubscription){
            return response()->json(['status' => true,'subscriptions' => $UserSubscription]);
        }
        return response()->json(['status' => false]);

    }
    function footerData()
    {
        $response['SocialMedia'] = SocialMedia::get();
        
        return response()->json($response);
    }

    function faqs()
    {
        $response  = Question::with(['translationAll','QuestionsAnswer.translationAll'])->get();
        
        return response()->json($response);
    }
}

