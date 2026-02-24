<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * Class Category
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = DBTables::CATEGORIES;

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
        self::creating(static function ($category): void {
            $category->slug = Str::slug($category->name);
        });
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'category_id');
    }

    public function menusOrdered(): HasMany
    {
        return $this->hasMany(Menu::class)->orderBy('id', 'desc');
    }
        public function familyOrdered(): HasMany
    {
        return $this->hasMany(Menu::class)->orderBy('id', 'desc');
    }

           public function scopeStatus($query)
    {
        return $query->where('status',1);
    }
    
    
}
