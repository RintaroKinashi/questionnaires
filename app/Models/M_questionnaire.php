<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function questionnaires()
    {
        return $this->hasMany('App\Models\R_questionnaire');
    }
}
