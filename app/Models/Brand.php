<?php

namespace App\Models;

use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * class Brand
 */
class Brand extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::BRANDS;

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
        'image',
        'link',
        'order',
        'status',
        'metadata',
    ];
}
