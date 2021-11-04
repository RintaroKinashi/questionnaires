<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class R_anser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\R_questionnaire');
    }
}
