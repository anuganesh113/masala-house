<?php

namespace App\Models;

use App\Constants\DBTables;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

/**
 * class Admin
 *
 * @property int $id
 * @property ?string $name
 * @property string $email
 * @property string $password
 * @property ?string $profile
 * @property ?string $contact
 * @property ?string $address
 * @property string $status
 */
class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = DBTables::ADMINS;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'contact',
        'address',
        'status',
    ];

    protected bool $timestamp = true;

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function booted(): void
    {
        static::saving(function ($user) {
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
            }
        });
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
