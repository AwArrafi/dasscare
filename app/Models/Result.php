<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'test_session_id',

        'score_depression',
        'score_anxiety',
        'score_stress',

        'category_depression',
        'category_anxiety',
        'category_stress',
    ];
}
