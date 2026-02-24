<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class RentalSpaceSocialCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $value = json_decode($value);

        return [
            'facebook' => data_get($value, 'facebook'),
            'instagram' => data_get($value, 'instagram'),
            'youtube' => data_get($value, 'youtube'),
            'tiktok' => data_get($value, 'tiktok'),
        ];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return (string) json_encode([
            'facebook' => data_get($value, 'facebook'),
            'instagram' => data_get($value, 'instagram'),
            'youtube' => data_get($value, 'youtube'),
            'tiktok' => data_get($value, 'tiktok'),
        ]);
    }
}
