<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JourneyChapter extends Model
{
    protected $fillable = [
        'chapter_tag',
        'year_label',
        'title',
        'content',
        'features',
        'image_path',
        'order_num',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
