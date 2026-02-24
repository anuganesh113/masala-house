<?php

namespace App\Http\Requests\MemberMessage;

use App\Enums\Max;
use App\Enums\Mimes;
use App\Enums\Status;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

/**
 * Class MemberMessageRequest
 */
class MemberMessageRequest extends FormRequest
{
    use FileUpload;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
                File::types(Mimes::IMG)->max(Max::IMAGE)
            ],
            'designation' => ['required', 'max:255'],
            'message' => ['required'],
            'status' => ['required', Rule::in(Status::getValues())],
            'order' => ['required', 'numeric'],
        ];
    }

    /**
     * @return array
     */
    public function prepareData(): array
    {
        $response = $this->only(['name','designation','message','order','status']);
        $response['slug'] = Str::slug(sprintf('%s %s', data_get($this, 'name'), data_get($this, 'designation')));

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::MEMBERS_PATH);
        }

        return $response;
    }
}
