<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HakiItem extends Model
{
    protected $guarded = [];

    protected $casts = [
        'registration_date' => 'date',
    ];
}
