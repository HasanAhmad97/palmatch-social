<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'title', 'description', 'subscription_id'];

    public function Subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}
