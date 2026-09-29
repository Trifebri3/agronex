<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'year',
        'status',
        'title',
        'subtitle',
        'description',
        'image_path',
        'video_path',
        'document_path',
        'gallery',
        'locations',
        'technologies',
        'lessons_learned',
        'impact',
        'achievements',
        'related_product',
        'order_num',
        'is_published',
    ];

    protected $casts = [
        'gallery' => 'array',
        'locations' => 'array',
        'technologies' => 'array',
        'is_published' => 'boolean',
    ];
}
