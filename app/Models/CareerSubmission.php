<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareerSubmission extends Model
{
    protected $fillable = [
        'career_id',
        'full_name',
        'email',
        'phone',
        'current_location',
        'linkedin_url',
        'portfolio_url',
        'highest_education',
        'university',
        'years_of_experience',
        'current_company',
        'resume_path',
        'cover_letter',
        'status',
    ];

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}
