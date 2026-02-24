<?php

namespace App\Models;

use App\Casts\SEOCast;
use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * class MemberMessage
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $designation
 * @property string $image
 * @property string $message
 * @property string $type
 * @property int $order
 * @property int $status
 * @property array $metadata
 * @property array $seo
 */
class MemberMessage extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::MEMBER_MESSAGES;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
        'seo' => SEOCast::class
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'designation',
        'image',
        'message',
        'type',
        'status',
        'order',
        'metadata',
        'seo'
    ];

    public function message(): HasMany
    {
        return $this->hasMany(Testimonial::class, 'member_message_id');
    }
}
