<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'first_name', 'last_name', 'email',
        'project_type', 'message', 'status',
    ];

    protected $casts = ['created_at' => 'datetime'];
}
