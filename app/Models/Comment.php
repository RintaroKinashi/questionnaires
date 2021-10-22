<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // フォームで投稿された内容をDBに保存するための許可設定
    protected $fillable = [
        'body',
        'user_id',
        'post_id',
    ];

    public function user()
    {
        // １コメントが１ユーザに結びつくという宣言
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        // 1コメントが１投稿に結びつく
        return $this->belongsTo('App\Models\Post');
    }
}
