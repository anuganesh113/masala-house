<?php

namespace App\Http\Requests\Advertise;

use App\Enums\AdvertiseType;
use App\Enums\Max;
use App\Enums\Mimes;
use App\Enums\Status;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class AdvertiseRequest
 */
class AdvertiseRequest extends FormRequest
{
    use FileUpload;

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
            'name' => ['required', 'max:255'],
            'image' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'link' => ['nullable', 'url', 'max:255'],
            'status' => ['nullable', Rule::in(Status::getValues())],
            'type' => ['required', Rule::in(AdvertiseType::getValues())],
            'order' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only(['name', 'link', 'status', 'order', 'type']);

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::ADVERTISES_PATH);
        }

        return $response;
    }
}
