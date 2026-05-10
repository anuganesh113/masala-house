<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use App\Enums\UploadFilePath;
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
        'excerpt',
        'type',
        'metadata',
        'status',
        'seo',
        'order'
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

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

      public function scopeEvent($query)
    {
        return $query->where('type', 1);
    }
         public function scopeCatering($query)
    {
        return $query->where('type', 2);
    }



    public function getFullImageLinkAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        return asset(sprintf('%s%s', UploadFilePath::EVENT_PATH, $this->image));
    }

    public function eventfaqs()
    {
        return $this->hasMany(FAQ::class, 'model_id')
            ->where('model_type', 'event')->where('status', 1)
            ->orderBy('order');
    }

    public function scopeMaxOrder($query)
    {
        return $query->max('order');
    }
    
}
