<?php

namespace App\Models\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Auth\Session;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /*
    |----------------------------------------
    | FILLABLE
    |----------------------------------------
    */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'avatar',
        'email_verified_at',
        'last_login_at',
    ];

    /*
    |----------------------------------------
    | HIDDEN
    |----------------------------------------
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |----------------------------------------
    | CASTS
    |----------------------------------------
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    /*
    |----------------------------------------
    | RELATIONSHIPS
    |----------------------------------------
    */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}