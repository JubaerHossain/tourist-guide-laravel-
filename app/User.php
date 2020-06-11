<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone',
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

    public function balance(){
        return $this->hasOne('App\Balance');
    }
    public function customer(){
        return $this->hasOne('App\Customer');
    }
    public function guide(){
        return $this->hasOne('App\Guide');
    }
    public function account(){
        return $this->hasOne('App\Account');
    }
    public function user_role(){
        return $this->hasOne('App\User_role');
    }
    public function guide_posts(){
        return $this->hasMany('App\GuidePost');
    }
}
