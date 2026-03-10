<?php

namespace App\Models;

use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * class Testimonial
 */
class Testimonial extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::TESTIMONIALS;

    /**
     * @var string[]
     */
    protected $casts = [
        'metadata' => 'json',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'member_message_id',
        'name',
        'designation',
        'image',
        'message',
        'status',
        'metadata',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(MemberMessage::class, 'member_message_id');
    }
           public function scopeStatus($query)
    {
        return $query->where('status',1);
    }
}
