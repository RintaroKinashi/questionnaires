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
        return $this->hasMany('App\Models\R_anser');
    }
}
