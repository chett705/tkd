<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';

    public $timestamps = false; 

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'project_type',
        'message',
        'status',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
