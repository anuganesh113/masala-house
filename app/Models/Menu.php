<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * Class Menu
 */
class Menu extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::MENUS;

    protected $casts = [
        'seo' => SEOCast::class,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'image_alt',
        'excerpt',
        'description',
        'old_price',
        'price',
        'type',
        'status',
        'seo',
    ];

    // protected static function booted(): void
    // {
    //     parent::boot();

    //     self::creating(static function ($menu): void {
    //         $menu->slug = Str::slug($menu->name);
    //     });
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
        public function scopeStatus($query)
    {
        return $query->where('status',1);
    }
}
