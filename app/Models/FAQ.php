<?php

namespace App\Models;

use App\Casts\SEOCast;
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

    protected $casts = [
        'metadata' => 'json',
        'seo' => SEOCast::class,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'question',
        'answer',
        'order',
        'status',
        'model_id',
        'model_type',
        'seo',
        'metadata',

    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'model_id');
    }

       public function faqs(): BelongsTo
    {
        return $this->belongsTo(Faq::class, 'model_id');
    }

}
