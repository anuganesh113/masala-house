<?php

namespace App\Models;

use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
   use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table =  DBTables::POPUPS;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'title',
        'image',
        'description',
        'link',
        'metadata',
        'type',
        'status',
        'order',
    ];
}
