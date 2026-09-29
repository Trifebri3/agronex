<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recognition extends Model
{
    protected $fillable = [
        'category',
        'year',
        'title',
        'organization',
        'description',
        'award_logo_path',
        'certificate_path',
        'doc_path',
        'story',
        'related_project',
        'media_coverage',
        'team_member_id',
        'order_num',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Relationship: A recognition can be optionally linked to a team member
     */
    public function teamMember()
    {
        return $this->belongsTo(TeamMember::class, 'team_member_id');
    }
}
