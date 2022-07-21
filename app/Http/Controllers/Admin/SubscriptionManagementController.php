<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\SubscriptionManagementEloquent;
use App\Subscription;
use App\User;
use App\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionManagementController extends Controller
{
    private $subManage;

    public function __construct(SubscriptionManagementEloquent $subManageEloquent)
    {
        $this->subManage = $subManageEloquent;
    }

    public function index()
    {
        $data = [
            'main_title' => 'subscriptions management',
            'icon' => 'fas fa-layer-group',
            'users' => User::all(),
            'subscriptions' => Subscription::all(),
        ];
        return view(admin_subscriptions_management_vw() . '.index', $data);
    }

    public function anyData()
    {
        return $this->subManage->anyData();
    }



    public function view($id)
    {
        $subManage = UserSubscription::with('User' , 'Subscription')->find($id);
        if(isset($subManage)) {
            $data = [
                'main_title' => 'subscription management',
                'icon' => 'fa fa-users',
                'subManage' => $subManage,
            ];
            return view(admin_subscriptions_management_vw() . '.view', $data);
        }
        abort(401);
    }

}
