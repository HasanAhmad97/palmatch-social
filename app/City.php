<?php

namespace App;

use App\Support\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use Translateable;

    //
    use SoftDeletes;

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(CityTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(CityTranslation::class)->where('language', '=', $language);
    }

    public function translationAll()
    {
        $language = app()->getLocale();
        return $this->hasOne(CityTranslation::class)->where('language', '=', $language);
    }
}
