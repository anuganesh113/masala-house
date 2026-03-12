<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Casts\SocialLinkCast;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Model;

/**
 * class Setting
 */
class Setting extends Model
{
    /**
     * @var string
     */
    protected $table = DBTables::SETTING;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
        'social' => SocialLinkCast::class,
        'seo' => SEOCast::class,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'white_logo',
        'email',
        'address',
        'contact',
        'phone',
        'footer_text',
        'metadata',
        'social',
        'seo',
        'color_logo'
    ];
}
