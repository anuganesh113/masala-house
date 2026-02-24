<?php

namespace App\Http\Requests\Inquiry;

use App\Constants\DBTables;
use App\Enums\InquiryType;
use App\Enums\Status;
use App\Rules\ContactNumberRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class InquiryRequest
 */
class InquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'product_id' => 'product',
            'name' => 'name',
            'address' => 'address',
            'contact' => 'contact',
            'email' => 'email',
            'message' => 'message',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'product' => [
                'required',
                Rule::exists(DBTables::PRODUCTS, 'id'),
            ],
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'contact' => [
                'required',
                new ContactNumberRule,
            ],
            'type' => ['nullable', Rule::in(InquiryType::getValues())],
            'email' => ['required', 'email:filter,dns,rfc', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
        ];
    }

    public function prepareData(): array
    {
        return [
            'product_id' => data_get($this, 'product'),
            'metadata' => $this->only(['name', 'address', 'contact', 'email', 'message']),
            'type' => data_get($this, 'type', InquiryType::INQUIRY),
            'seen' => Status::INACTIVE,
        ];
    }
}
