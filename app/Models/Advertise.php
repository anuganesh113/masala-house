<?php

namespace App\Models;

use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Advertise
 */
class Advertise extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::ADVERTISES;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'link',
        'order',
        'status',
        'type',
    ];
}
