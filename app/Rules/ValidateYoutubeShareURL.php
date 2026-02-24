<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class ValidateYoutubeShareURL
 */
class ValidateYoutubeShareURL implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        $signature = '/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.?be)\/.+$/';

        return preg_match($signature, $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return ':attribute must be a valid YouTube Share URL.';
    }
}
