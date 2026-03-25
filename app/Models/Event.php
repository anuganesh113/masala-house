<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
     /**
     * @var string
     */
    protected $table = DBTables::EVENTS;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'metadata',
        'seo',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
        'seo' => SEOCast::class,
    ];

    protected static function booted(): void
    {
        self::creating(static function ($event): void {
            $event->slug = Str::slug($event->name);
        });
    }

    public function menus(): HasMany
    {
        return $this->hasMany(FAQ::class, 'model_id');
    }
}
