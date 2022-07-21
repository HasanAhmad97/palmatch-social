<?php

namespace App;

use App\Support\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmazingFeature extends Model
{
    use Translateable;

    protected $fillable = ['icon'];
    //
    use SoftDeletes;

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(AmazingFeatureTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(AmazingFeatureTranslation::class)->where('language', '=', $language);
    }

    public function translationAll()
    {
        $language = app()->getLocale();         
        return $this->hasOne(AmazingFeatureTranslation::class)->where('language', '=', $language);
    }

    public function getIconAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }

}
