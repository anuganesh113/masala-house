<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use App\Enums\UploadFilePath;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * class Blog
 */
class Blog extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::BLOGS;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
        'seo' => SEOCast::class,
    ];

    protected $appends = ['full_image_link'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'tag',
        'name',
        'slug',
        'image',
        'excerpt',
        'description',
        'author',
        'status',
        'metadata',
        'seo',
    ];

    /**
     * @return void
     */
    protected static function booted(): void
    {
        self::creating(static function ($blog): void {
            $blog->slug = Str::slug($blog->name);
        });
    }

    public function getFullImageLinkAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        return asset(sprintf('%s%s', UploadFilePath::BLOGS_PATH, $this->image));
    }
}
