<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use App\Enums\UploadFilePath;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * class Album
 */
class Album extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::ALBUMS;

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
        'slug',
        'description',
        'image',
        'order',
        'metadata',
        'status',
        'seo',
    ];

    protected static function booted(): void
    {
        parent::boot();

        self::creating(static function ($event): void {
            $event->slug = Str::slug($event->name);
        });

        self::deleted(function (Album $album): void {
            foreach ($album->gallery ?? [] as $gal) {
                @unlink(sprintf('%s%s', UploadFilePath::GALLERIES_PATH, data_get($gal, 'image')));
            }
            $album->gallery()->delete();
        });
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }
}
