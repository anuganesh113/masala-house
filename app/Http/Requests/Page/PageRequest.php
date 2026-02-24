<?php

namespace App\Http\Requests\Page;

use App\Constants\DBTables;
use App\Enums\Max;
use App\Enums\Mimes;
use App\Enums\Status;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * class PageRequest
 */
class PageRequest extends FormRequest
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
            'name' => 'page name',
            'parent' => 'parent page',
            'image_one' => 'image one',
            'image_one_alt' => 'image one alt',
            'image_two' => 'image two',
            'image_two_alt' => 'image two alt',
            'images.*' => 'images',
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
            'name' => [
                'required', 'max:255',
                Rule::unique(DBTables::PAGES, 'name')->ignore($this->page),
            ],
            'title' => ['nullable', 'max:255'],
            'parent' => [
                'nullable',
                Rule::exists(DBTables::PAGES, 'id'),
            ],
            'image_one' => [
                'nullable',
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'image_two' => [
                'nullable',
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'images' => ['nullable', 'array'],
            'images.*' => [
                'nullable',
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'template' => ['required', 'max:255'],
            'order' => ['nullable', 'numeric', 'min:1'],
            'status' => ['required', Rule::in(Status::getValues())],
        ];
    }

    public function prepareData(): array
    {
        $response = [
            'page_id' => data_get($this, 'parent'),
            ...$this->only(['title','name','image_one_alt','image_two_alt','excerpt','description','template','order','status','seo']),
        ];

        if ($this->hasFile('image_one')) {
            $response['image_one'] = $this->uploadImage($this->file('image_one'), UploadFilePath::PAGES_PATH);
        }

        if ($this->hasFile('image_two')) {
            $response['image_two'] = $this->uploadImage($this->file('image_two'), UploadFilePath::PAGES_PATH);
        }

        if ($this->hasFile('images')) {
            $response['images'] = $this->multipleImageUpload($this->file('images'), UploadFilePath::IMAGES_PATH);
        }

        return $response;
    }
}
