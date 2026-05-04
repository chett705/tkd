<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_infos';

    public $timestamps = false;

    protected $fillable = [
        'address',
        'email',
        'phone_1',
        'phone_2',
        'working_hours',
    ];
}
