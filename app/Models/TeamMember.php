<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $guarded = [];

    /**
     * Relationship: A team member can have multiple recognitions/awards
     */
    public function recognitions()
    {
        return $this->hasMany(Recognition::class, 'team_member_id');
    }
}
