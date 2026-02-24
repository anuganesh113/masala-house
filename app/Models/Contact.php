<?php

namespace App\Models;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Model;

/**
 * class Contact
 */
class Contact extends Model
{
    /**
     * @var string
     */
    protected $table = DBTables::CONTACTS;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
        'seen' => 'boolean',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'metadata',
        'seen',
    ];
}
