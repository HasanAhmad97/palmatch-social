<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['age', 'is_like','viewers'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function social_accounts()
    {
        return $this->hasMany(SocialAccount::class, 'user_id', 'id');
    }

    public function UserSocialMedia()
    {
        return $this->hasMany(UserSocialMedia::class, 'user_id', 'id');
    }

    public function Hobbies()
    {
        return $this->hasMany(UserHobby::class, 'user_id', 'id');
    }

    public function Interests()
    {
        return $this->hasMany(UserInterest::class, 'user_id', 'id');
    }


    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function UserGallery()
    {
        return $this->hasMany(UserGallery::class, 'user_id', 'id');
    }

    public function Likes()
    {
        return $this->hasMany(Like::class, 'user_like_id', 'id');
    }
    public function Viewers()
    {
        return $this->hasMany(View::class, 'viewer', 'id');
    }
    public function Interest()
    {
        return $this->belongsTo(Interest::class, 'interest_id');
    }

    public function Religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function getPhoto100Attribute()
    {
        if ($this->is_init)
            return $this->photo;
        if (isset($this->getAttributes()['photo']))
            return url('storage/app/users/' . $this->id) . '/100/' . $this->getAttributes()['photo'];
        return url(assets('site') . '/images/uploadImg.png');
    }

    public function getPhoto300Attribute()
    {
        if ($this->is_init)
            return $this->photo;
        if (isset($this->getAttributes()['photo']))
            return url('storage/app/users/' . $this->id) . '/300/' . $this->getAttributes()['photo'];
        return url(assets('site') . '/images/uploadImg.png');
    }

    public function getPhotoAttribute($value)
    {
        if ($this->is_init)
            return $value;
        if (isset($value))
            return url('storage/app/users/' . $this->id) . '/avatar/' . $value;
        return url(assets('site') . '/images/uploadImg.png');
    }

    public function getCover100Attribute()
    {
        if ($this->is_init)
            return $this->cover;
        if (isset($this->getAttributes()['cover']))
            return url('storage/app/users/' . $this->id) . '/100/' . $this->getAttributes()['cover'];
        return url(assets('site') . '/images/uploadImg.png');
    }

    public function getCover300Attribute()
    {
        if ($this->is_init)
            return $this->cover;
        if (isset($this->getAttributes()['cover']))
            return url('storage/app/users/' . $this->id) . '/300/' . $this->getAttributes()['cover'];
        return url(assets('site') . '/images/uploadImg.png');
    }

    public function getCoverAttribute($value)
    {
        if ($this->is_init)
            return $value;
        if (isset($value))
            return url('storage/app/users/' . $this->id) . '/cover/' . $value;
        return url(assets('site') . '/images/uploadImg.png');
    }


    public function getAgeAttribute()
    {
        return Carbon::now()->diffInYears(Carbon::parse($this->dob));
    }

    public function getIsLikeAttribute()
    {
        if (auth()->check())
            return Like::where('user_like_id', $this->id)->where('user_id', auth()->user()->id)->first() ? 1 : 0;

        return 0;
    }

    public function getViewersAttribute()
    {
        return View::where('user_id', $this->id)->count();
    }
}
