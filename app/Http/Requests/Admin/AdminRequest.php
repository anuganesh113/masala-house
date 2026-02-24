<?php

namespace App\Http\Requests\Admin;

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
 * class AdminRequest
 */
class AdminRequest extends FormRequest
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
            'email' => [
                'required',
                Rule::unique(DBTables::ADMINS, 'email')->ignore($this->admin),
                'email:filter,dns,rfc',
                'max:255',
            ],
            'profile' => [
                'nullable',
                File::types(Mimes::buildMimes([Mimes::IMG]))->max(Max::ADMIN),
            ],
            'contact' => ['nullable'],
            'status' => ['required', Rule::in(Status::getValues())],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only(['name', 'email', 'status', 'contact', 'address']);

        if ($this->hasFile('profile')) {
            $response['profile'] = $this->uploadImage($this->file('profile'), UploadFilePath::ADMINS_PATH);
        }

        return $response;
    }
}
