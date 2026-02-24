<?php

namespace App\Models;

use App\Constants\DBTables;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * class User
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = DBTables::USERS;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'contact',
        'status',
        'email_verified_at',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
