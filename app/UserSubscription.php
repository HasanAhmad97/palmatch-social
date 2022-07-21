<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class UserSubscription extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['user_id','subscription_id'];
    
    protected $appends = ['is_finished_subscribtion'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }


    public function planPrivilegs()
    {
        return $this->belongsTo(PlanePrivilege::class, 'subscription_id', 'subscription_id');
    }

    public function getIsFinishedSubscribtionAttribute()
    {
        $subscription = Subscription::find($this->subscription_id);
        
        if($subscription->duration_type == 'year')
            $end_date = (Carbon::parse($this->created_at))->addYears($subscription->duration);
        elseif($subscription->duration_type == 'month')
            $end_date = (Carbon::parse($this->created_at))->addMonths($subscription->duration);
        elseif($subscription->duration_type == 'week')
            $end_date = (Carbon::parse($this->created_at))->addDays($subscription->duration*7);
    
        return (Carbon::now() > $end_date) ;
    }
}
