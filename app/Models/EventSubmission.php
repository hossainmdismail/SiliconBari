<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventSubmission extends Model
{
    protected $fillable = [
        'event_id',
        'full_name',
        'email',
        'phone',
        'current_location',
        'job_title',
        'university_company',
        'industry',
        'additional_info',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
