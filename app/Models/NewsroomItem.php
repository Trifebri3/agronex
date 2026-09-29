<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsroomItem extends Model
{
    protected $guarded = [];

    protected $casts = [
        'publish_date' => 'date',
    ];
}
