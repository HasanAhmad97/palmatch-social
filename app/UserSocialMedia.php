<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSocialMedia extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['user_id', 'social_id','link'];
    
    public function SocialMedia()
    {
        return $this->belongsTo(SocialMedia::class, 'social_id');
    }
}
