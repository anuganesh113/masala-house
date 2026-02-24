<?php

namespace App\Models;

use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * class Banner
 */
class Banner extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::BANNERS;

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
        'video',
        'description',
        'link',
        'metadata',
        'type',
        'status',
        'order',
    ];
}
