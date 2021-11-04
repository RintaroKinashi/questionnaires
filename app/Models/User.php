<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// モデルはDBとのやり取りを担当

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // リレーションの構築
    public function posts()
    {
        // 1人のユーザが複数のPostに結びつく
        return $this->hasMany('App\Models\Post');
    }

    public function comments()
    {
        // １ユーザが複数のコメントに結びつくという宣言
        return $this->hasMany('App\Models\Comment');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function questionnaires()
    {
        return $this->hasMany('App\Models\M_questionnaire');
    }

    public function anseres()
    {
        return $this->hasMany('App\Models\R_anser');
    }
}
