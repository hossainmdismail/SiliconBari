<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'event_date',
        'event_time',
        'location',
        'description',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function submissions()
    {
        return $this->hasMany(EventSubmission::class);
    }
}
