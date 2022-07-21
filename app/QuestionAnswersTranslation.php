<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionAnswersTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'text', 'questions_answer_id'];


}
