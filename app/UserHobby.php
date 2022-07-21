<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHobby extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['user_id', 'hobby_id'];

    public function Hobby()
    {
        return $this->hasOne(Hobby::class, 'id', 'hobby_id');
    }
    public function UserHobby()
    {
        return $this->hasMany(UserHobby::class, 'hobby_id', 'hobby_id');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
