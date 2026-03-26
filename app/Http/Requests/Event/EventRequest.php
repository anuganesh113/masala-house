<?php

namespace App\Http\Requests\Event;

use App\Constants\DBTables;
use App\Enums\Max;
use App\Enums\Mimes;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;


class EventRequest extends FormRequest
{
    use FileUpload;

    public function authorize(): bool
    {
        return true;
    }

    // protected function prepareForValidation()
    // {

    //     $this->merge([
    //         'slug' => $this->slug ? $this->slug :  Str::slug($this->name),
    //     ]);
    // }



    public function attributes(): array
    {
        return [
            'metadata.title.*' => 'Title',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please Provide a Event Name.',
            'metadata.title.required' => 'Please Provide a Event Title.',
            'metadata.title.min' => 'Title must be at least 3 characters.',
            'metadata.title.max' => 'Title cannot exceed 255 characters.',
            'slug.unique' => 'This slug is already taken.',
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
            'image' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'metadata.title' => ['required'],
            'metadata.title.*' => ['required', 'max:255'],

        ];
    }
    public function prepareData(): array
    {
        $response = $this->only(['name', 'slug', 'image', 'excerpt', 'description', 'status', 'seo', 'metadata']);
        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::EVENT_PATH);
        }

        return $response;
    }
}
