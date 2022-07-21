<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoryTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'title', 'description', 'story_id'];

    public function Story()
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
}
