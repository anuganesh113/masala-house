<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * class Page
 */
class Page extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::PAGES;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
        'seo' => SEOCast::class,
        'images' => 'array',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'page_id',
        'name',
        'title',
        'slug',
        'image_one',
        'image_one_alt',
        'image_two',
        'image_two_alt',
        'excerpt',
        'description',
        'template',
        'order',
        'seo',
        'images',
        'metadata',
        'status',
    ];

    protected static function booted(): void
    {
        self::creating(static function ($page): void {
            $page->slug = Str::slug($page->name);
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function child(): HasMany
    {
        return $this->hasMany(Page::class, 'page_id');
    }
}
