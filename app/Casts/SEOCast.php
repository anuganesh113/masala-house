<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SEOCast
 */
class SEOCast implements CastsAttributes
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
            'title' => data_get($value, 'title'),
            'keywords' => data_get($value, 'keywords'),
            'description' => data_get($value, 'description'),
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
            'title' => data_get($value, 'title'),
            'keywords' => data_get($value, 'keywords'),
            'description' => data_get($value, 'description'),
        ]);
    }
}
