<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGallery extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'image'
    ];
    public function getImageAttribute($value)
    {
        if (isset($value))
            return url('storage/app/users/' . $this->user_id) . '/gallary/' . $value;
        return;
    }
}
