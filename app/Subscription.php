<?php

namespace App;

use App\Support\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PlanePrivilege;

class Subscription extends Model
{
    use Translateable;

    //
    use SoftDeletes;

    protected $fillable = ['duration','duration_type','cost'];

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(SubscriptionTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(SubscriptionTranslation::class)->where('language', '=', $language);
    }
    public function translationAll()
    {
        $language = app()->getLocale();
        return $this->hasOne(SubscriptionTranslation::class)->where('language', '=', $language);
    }


    public function subscriptionPermission($priviliges)
    {   
        $data = UserSubscription::with('planPrivilegs')->whereHas('planPrivilegs', function ($q) use ($priviliges) {
                $q->whereIn('privilege_id', $priviliges);
            })->where('user_id', auth()->user()->id)->orderBy('created_at','desc')->first();
        
        return  $data;
    }
}
