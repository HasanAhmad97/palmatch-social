<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmazingFeatureTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'title', 'description', 'amazing_feature_id'];

    public function AmazingFeature()
    {
        return $this->belongsTo(AmazingFeature::class, 'amazing_feature_id');
    }
}
