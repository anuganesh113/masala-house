<?php

namespace App\Http\Requests\Deal;

use App\Enums\Max;
use App\Enums\Mimes;
use App\Enums\Status;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class DealRequest extends FormRequest
{
    use FileUpload;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'image' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'type' => ['nullable', 'max:255'],
            'status' => ['required', Rule::in(Status::getValues())],
            'link' => ['nullable', 'url', 'max:255'],
            'order' => ['required', 'numeric'],
            'excerpt' => ['nullable'],
            'description' => ['nullable'],
            'old_price' => ['nullable', 'numeric'],
            'price' => ['nullable', 'numeric'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only([
            'name', 'type', 'status', 'link', 'order', 'excerpt', 
            'description', 'old_price', 'price', 'start_date', 'end_date'
        ]);

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::DEALS_PATH);
        }

        return $response;
    }
}
