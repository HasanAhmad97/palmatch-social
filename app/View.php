<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class View extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'viewer'
    ];

    public function User()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
