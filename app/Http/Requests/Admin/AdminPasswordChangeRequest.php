<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * class AdminPasswordChangeRequest
 */
class AdminPasswordChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'different:new_password', 'min:6', 'max:25'],
            'new_password' => ['required', 'same:confirm_password', 'min:6', 'max:25'],
            'confirm_password' => ['required', 'min:6', 'max:25'],
        ];
    }
}
