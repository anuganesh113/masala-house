<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Service
 */
class Service extends Model
{
    /**
     * @var string $table
     */
    protected $table = DBTables::SERVICES;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'excerpt',
        'description',
        'metadata',
        'seo'
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'metadata' => 'json',
        'seo' => SEOCast::class
    ];

    /**
     * @return void
     */
    protected static function booted(): void
    {
        self::creating(static function ($service): void {
            $service->slug = Str::slug($service->name);
        });
    }
}
