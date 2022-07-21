<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialMedia extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['icon', 'name', 'link'];

    public function UserSocialMedia()
    {
        return $this->belongsTo(UserSocialMedia::class, 'id','social_id')->where('user_id', auth()->user()->id);
    }

}
