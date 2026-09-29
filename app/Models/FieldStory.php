<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldStory extends Model
{
    protected $guarded = [];

    protected $casts = [
        'interview_quotes' => 'array',
    ];
}
