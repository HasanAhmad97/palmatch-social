<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInterest extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['user_id', 'interest_id'];

    public function Interest()
    {
        return $this->hasOne(Interest::class, 'id','interest_id');
    }
    public function UserInterest()
    {
        return $this->hasMany(UserInterest::class, 'interest_id', 'interest_id');
    }
}
