<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{

    protected $casts = [
        'metadata' => 'json',
        'seo' => 'json',
         'start_date' => 'datetime',
    'end_date' => 'datetime',

    ];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'type',
        'status',
        'link',
        'order',
        'excerpt',
        'description',
        'old_price',
        'price',
        'start_date',
        'end_date',
        'metadata',
        'seo'

    ];
}
