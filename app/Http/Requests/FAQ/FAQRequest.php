<?php

namespace App\Http\Requests\FAQ;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class FAQRequest
 */
class FAQRequest extends FormRequest
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
            'question' => ['required', 'max:255'],
            'answer' => ['required'],
            'status' => ['required', Rule::in(Status::getValues())],
            'order' => ['required', 'numeric', 'min:1', 'max:9999999'],
        ];
    }

    public function prepareData(): array
    {
        return [
            'question' => data_get($this, 'question'),
            'answer' => data_get($this, 'answer'),
            'status' => data_get($this, 'status'),
            'order' => data_get($this, 'order'),
        ];
    }
}
