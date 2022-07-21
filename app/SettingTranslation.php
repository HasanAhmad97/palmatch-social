<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingTranslation extends Model
{
    //
    use SoftDeletes;


    protected $fillable = ['language', 'name', 'religion_id','meet_prople_content', 'amazing_feature_content', 'stories_content', 'membership_content'
        , 'register_member_content' , 'about_us_content', 'terms_content', 'policy_content', 'faqs_content'];

    public function Setting()
    {
        return $this->belongsTo(Setting::class, 'setting_id');
    }
}
