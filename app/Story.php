<?php

namespace App;

use App\Support\Translateable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use Translateable;

    protected $fillable = ['image'];
    //
    protected $appends = ['created_date'];
    use SoftDeletes;

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(StoryTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(StoryTranslation::class)->where('language', '=', $language);
    }

    public function translationAll()
    {
        $language = app()->getLocale();         
        return $this->hasOne(StoryTranslation::class)->where('language', '=', $language);
    }

    public function getImageAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('F d, Y');
    }
}
