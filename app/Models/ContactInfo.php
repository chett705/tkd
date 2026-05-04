<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    public $timestamps = false;

    protected $table = 'contact_info';

    protected $fillable = ['address', 'email', 'phone_1', 'phone_2', 'working_hours'];
}
