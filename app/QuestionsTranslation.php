<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionsTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'text', 'question_id'];


}
