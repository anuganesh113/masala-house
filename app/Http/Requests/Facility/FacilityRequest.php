<?php

namespace App\Http\Requests\Facility;

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
 * Class FacilityRequest
 */
class FacilityRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique(DBTables::FACILITIES)->ignore($this->route()->parameter('facility')),
                'max:255',
            ],
            'title' => [
                'required',
                Rule::unique(DBTables::FACILITIES)->ignore($this->route()->parameter('facility')),
                'max:255',
            ],
            'icon' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'image' => [
                Rule::requiredIf($this->route()->getActionMethod() === 'store'),
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'description' => ['nullable'],
            'tag' => ['nullable', 'max:255'],
            'status' => ['required', Rule::in(Status::getValues())],
            'order' => ['required', 'min:1'],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only(['name', 'title', 'description', 'tag', 'status', 'order', 'seo']);

        if ($this->hasFile('icon')) {
            $response['icon'] = $this->uploadImage($this->file('icon'), UploadFilePath::FACILITIES_PATH);
        }

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::FACILITIES_PATH);
        }

        return $response;
    }
}
