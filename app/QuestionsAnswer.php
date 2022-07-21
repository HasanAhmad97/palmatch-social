<?php

namespace App;

use App\Support\Translateable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionsAnswer extends Model
{
    use Translateable;

    //
    use SoftDeletes;
    protected $fillable = ['question_id'];

    public function translation($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(QuestionAnswersTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(QuestionAnswersTranslation::class)->where('language', '=', $language);
    }

    public function translationAll()
    {
        $language = app()->getLocale();         
        return $this->hasOne(QuestionAnswersTranslation::class)->where('language', '=', $language);
    }
}
