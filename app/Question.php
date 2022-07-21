<?php

namespace App;

use App\Support\Translateable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use Translateable;

    //
    use SoftDeletes;

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(QuestionsTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(QuestionsTranslation::class)->where('language', '=', $language);
    }

    public function translationAll()
    {
        $language = app()->getLocale();         
        return $this->hasOne(QuestionsTranslation::class)->where('language', '=', $language);
    }
    public function QuestionsAnswer()
    {
        return $this->hasMany(QuestionsAnswer::class, 'question_id','id');
    }
}
