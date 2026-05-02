<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company',
        'service_interest',
        'message',
        'ip_address',
        'user_agent',
    ];
}
