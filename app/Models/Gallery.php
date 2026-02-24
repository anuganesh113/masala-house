<?php

namespace App\Models;

use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * class Gallery
 */
class Gallery extends Model
{
    /**
     * @var string
     */
    protected $table = DBTables::GALLERIES;

    /**
     * @var string[]
     */
    protected $fillable = [
        'album_id',
        'image',
        'type',
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
