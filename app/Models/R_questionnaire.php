<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_questionnaire extends Model
{
    use HasFactory;

    public function questionnaire()
    {
        return $this->belongsTo('App\Models\M_questionnaire');
    }

    public function anser()
    {
        // 主テーブル側の１対１記述
        return $this->hasOne('App\Models\R_anser');
    }
}
