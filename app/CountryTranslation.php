<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'name', 'country_id'];

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
