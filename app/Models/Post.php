<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // フォームで投稿された内容をDBに保存するための許可設定
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image',
    ];

    public function user()
    {
        // １投稿が１ユーザに結びつくという宣言
        return $this->belongsTo('App\Models\User');
    }
}
