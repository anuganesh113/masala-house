<?php

namespace App\Http\Requests\Gallery;

use App\Constants\DBTables;
use App\Constants\General;
use App\Enums\Max;
use App\Enums\Mimes;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * class GalleryRequest
 */
class GalleryRequest extends FormRequest
{
    use FileUpload;

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
            'gallery.*' => 'gallery image',
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
            'name' => ['required', 'max:255', Rule::unique(DBTables::ALBUMS)->ignore($this->gallery)],
            'order' => ['required', 'max:1'],
            'image' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'images' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                'array', sprintf('max:%s', General::GALLERY_ALLOWED),
            ],
            'images.*' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only(['name', 'description', 'order', 'seo']);

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::GALLERIES_PATH);
        }

        if ($this->hasFile('images')) {
            $response['gallery'] = $this->multipleImageUpload($this->file('images'), UploadFilePath::GALLERIES_PATH);
        }

        return $response;
    }
}
