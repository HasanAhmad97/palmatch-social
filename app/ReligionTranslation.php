<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReligionTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'name', 'religion_id'];

    public function Religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }
}
