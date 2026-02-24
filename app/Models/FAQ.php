<?php

namespace App\Models;

use App\Constants\DBTables;
use App\Models\Scopes\StatusScopeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class FAQ
 */
class FAQ extends Model
{
    use StatusScopeTrait;

    /**
     * @var string
     */
    protected $table = DBTables::FAQS;

    /**
     * @var string[]
     */
    protected $fillable = [
        'question',
        'answer',
        'order',
        'status',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
