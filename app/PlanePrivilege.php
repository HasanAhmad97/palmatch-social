<?php

namespace App;

use App\Support\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanePrivilege extends Model
{
    use Translateable;

    //
    use SoftDeletes;

    protected $fillable = ['privilege_id','subscription_id'];

}
