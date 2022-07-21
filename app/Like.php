<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'user_like_id'
    ];

    public function User()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
