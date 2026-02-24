<?php

namespace App\Http\Requests\Blog;

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
 * class BlogRequest
 */
class BlogRequest extends FormRequest
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
            'tag' => ['nullable', 'max:255'],
            'name' => ['required', 'max:255'],
            'slug' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'), 'max:255',
                Rule::unique(DBTables::BLOGS)->ignore($this->route()->parameter('blog')),
            ],
            'image' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'image_alt' => ['nullable', 'max:255'],
            'author' => ['required', 'max:255'],
            'status' => ['required', Rule::in(Status::getValues())],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only(['tag','name','slug','image_alt','excerpt','description','author','status','seo']);

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::BLOGS_PATH);
        }

        return $response;
    }
}
