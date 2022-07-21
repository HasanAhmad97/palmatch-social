<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterestTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'name', 'interest_id'];

    public function Interest()
    {
        return $this->belongsTo(Interest::class, 'interest_id');
    }
}
