<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * class ContactNumberRule
 */
class ContactNumberRule implements Rule
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
        if (preg_match('/^\d{9}$/', $value)) {
            return true;
        } elseif (strlen($value) == 10) {
            if (preg_match('/^(98|97)\d{8}$/', $value)) {
                return true;
            } else {
                $this->messages = 'The contact number must begin from 98 or 97 if it is mobile number';

                return false;
            }
        }

        $this->messages = 'The contact number must be either 7 or 10 digits';

        return false;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return $this->messages;
    }
}
