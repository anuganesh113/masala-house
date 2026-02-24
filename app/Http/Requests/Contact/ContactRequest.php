<?php

namespace App\Http\Requests\Contact;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;

/**
 * class ContactRequest
 */
class ContactRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email:filter,dns,rfc', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:1000'],
        ];
    }

    public function prepareData(): array
    {
        return [
            'metadata' => [
                ...$this->only(['name', 'email', 'subject', 'message']),
            ],
            'seen' => Status::INACTIVE,
        ];
    }
}
