<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\UserEloquent;
use App\User;
use App\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private  $userEloquent;

    public function __construct(UserEloquent $userEloquent)
    {
        $this->middleware('auth:admin');
         $this->userEloquent=$userEloquent;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $usersSubscription = UserSubscription::get()->count();

        $userSubscriptionPayments = DB::table('user_subscriptions')
            ->join('subscriptions', 'subscriptions.id', '=', 'user_subscriptions.subscription_id')
            ->select('user_subscriptions.*', 'subscriptions.*')
            ->orderByDesc('user_subscriptions.updated_at')
            ->get();
//            ->unique('user_id');

        $numberOfUserSubscriptionPayments = count($userSubscriptionPayments);
        $userSubscriptionPayments = $userSubscriptionPayments->sum(DB::raw('cost'));


        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $usersChart = User::select(DB::raw("COUNT(*) as count"), DB::raw("Date(created_at) as day"),
            DB::raw("Month(created_at) as month"))
//            ->whereBetween('created_at', [$start_week, $end_week])
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->groupBy('day','month')
            ->orderBy('day')
            ->get();


        $paymentsChart =  DB::table('user_subscriptions')
            ->join('subscriptions', 'subscriptions.id', '=', 'user_subscriptions.subscription_id')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MonthNAME(user_subscriptions.created_at) as day"),
                DB::raw("Month(user_subscriptions.created_at) as month") , DB::raw("SUM(cost) as cost"))
            ->where('user_subscriptions.created_at', '>=', Carbon::now()->subYear(1))
            ->groupBy('day','month')
            ->orderBy('month')
            ->get();

//        dd($paymentsChart);
//        $today = today();
//        $dates = [];
//
//        for($i=1; $i < $today->daysInMonth + 1; ++$i) {
//            $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('F-d');
//        }
//        dd($dates);

        $data = [];


        foreach($usersChart as $row)
        {
         ;
            $time = date_create($row->day);
            $day = date_format($time, 'm-d');


            $data['label']['data'][] = [$day , (int) $row->count];
        }

        $data['chart_data'] = json_encode($data);
//        dd(  $data['chart_data']);

        $payment = [];
        foreach($paymentsChart as $row)
        {
      $payment['label']['data'][] = [substr($row->day, 0, 3) , (int)$row->cost];
        }
        $payment['payment_data'] = json_encode($payment);

//        dd($payment['payment_data']);

        return view(admin_vw() . '.home' , compact(
            'users',
            'usersSubscription',
            'numberOfUserSubscriptionPayments',
            'userSubscriptionPayments',
            'usersChart',
            'data',
            'payment'
        ));
    }
}
