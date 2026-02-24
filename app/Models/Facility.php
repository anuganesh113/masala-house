<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * class Facility
 */
class Facility extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::FACILITIES;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
        'seo' => SEOCast::class,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'title',
        'slug',
        'icon',
        'image',
        'excerpt',
        'description',
        'tag',
        'status',
        'metadata',
        'seo',
    ];

    protected static function booted(): void
    {
        self::creating(static function ($event): void {
            $event->slug = Str::slug($event->name);
        });
    }
}
