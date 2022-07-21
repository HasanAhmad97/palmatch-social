<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HobbyTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'name', 'hobby_id'];

    public function Hobby()
    {
        return $this->belongsTo(Hobby::class, 'hobby_id');
    }
}
