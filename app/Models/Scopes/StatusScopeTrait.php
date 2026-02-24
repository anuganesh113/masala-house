<?php

namespace App\Models\Scopes;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait StatusScopeTrait
 */
trait StatusScopeTrait
{
    public function scopeStatus($query, int $status = Status::ACTIVE): Builder
    {
        return $query->whereStatus($status);
    }

    public function scopeSeen($query, int $seen = Status::ACTIVE): Builder
    {
        return $query->whereSeen($seen);
    }
}
