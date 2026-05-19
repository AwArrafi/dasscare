<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id',

        'test_session_id',

        'score_depression',
        'score_anxiety',
        'score_stress',

        'category_depression',
        'category_anxiety',
        'category_stress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
