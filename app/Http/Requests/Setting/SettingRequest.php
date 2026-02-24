<?php

namespace App\Http\Requests\Setting;

use App\Enums\Max;
use App\Enums\Mimes;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

/**
 * class SettingRequest
 */
class SettingRequest extends FormRequest
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
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'metadata.pan_no' => 'PAN number',
            'metadata.google_map_address' => 'Google map address',
            'metadata.google_map_iframe' => 'Google map iframe',
            'metadata.title.*' => 'Title',
            'metadata.count.*' => 'Count',
            'metadata.unit.*' => 'Unit',
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
            'name' => ['required', 'max:255'],
            'color_logo' => ['nullable', File::types(Mimes::IMG)->max(Max::IMAGE)],
            'white_logo' => ['nullable', File::types(Mimes::IMG)->max(Max::IMAGE)],
            'email' => ['required', 'email:filter', 'max:255'],
            'address' => ['nullable', 'max:255'],
            'contact' => ['nullable'],
            'phone' => ['nullable'],
            'footer_text' => ['nullable', 'max:1000'],
            'metadata.google_map_address' => ['nullable', 'url', 'max:1000'],
            'metadata.google_map_iframe' => ['nullable', 'max:1000'],
            'metadata.title.*' => ['nullable', 'max:255'],
            'metadata.count.*' => ['nullable', 'max:255'],
            'metadata.unit.*' => ['nullable', 'max:255'],
            'social.facebook' => ['nullable', 'url', 'max:255'],
            'social.youtube' => ['nullable', 'url', 'max:255'],
            'social.twitter' => ['nullable', 'url', 'max:255'],
            'social.instagram' => ['nullable', 'url', 'max:255'],
            'seo.title' => ['nullable'],
            'seo.keywords' => ['nullable'],
            'seo.description' => ['nullable'],
        ];
    }

    public function prepareData(): array
    {
        $response = [
            ...$this->only(['name','email','address','contact','phone','footer_text','social','seo']),
            'metadata' => [
                'pan_no' => data_get($this, 'metadata.pan_no'),
                'google_map_address' => data_get($this, 'metadata.google_map_address'),
                'google_map_iframe' => data_get($this, 'metadata.google_map_iframe'),
                'title' => data_get($this, 'metadata.title'),
                'count' => data_get($this, 'metadata.count'),
                'unit' => data_get($this, 'metadata.unit'),
            ],
        ];

        if ($this->hasFile('color_logo')) {
            $response['color_logo'] = $this->uploadImage($this->file('color_logo'), UploadFilePath::LOGO_PATH);
        }

        if ($this->hasFile('white_logo')) {
            $response['white_logo'] = $this->uploadImage($this->file('white_logo'), UploadFilePath::LOGO_PATH);
        }

        return $response;
    }
}
