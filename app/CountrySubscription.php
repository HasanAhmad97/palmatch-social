<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountrySubscription extends Model
{
    //
    use SoftDeletes;

    public function Subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}
