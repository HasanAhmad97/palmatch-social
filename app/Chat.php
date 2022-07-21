<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['user_id_one', 'user_id_two'];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id_one');
    }

    public function User2()
    {
        return $this->belongsTo(User::class,'user_id_two');
    }
}
