<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Session extends Model
{
    protected $table = 'sessions';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    protected $casts = [
        'last_activity' => 'integer',
    ];

    /*
    |----------------------------------------
    | RELATIONSHIP
    |----------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}