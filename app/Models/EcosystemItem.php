<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcosystemItem extends Model
{
    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
    ];
}
