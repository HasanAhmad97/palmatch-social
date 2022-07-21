<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'name', 'country_id'];

    public function City()
    {
        return $this->belongsTo(City::class, 'country_id');
    }
}
