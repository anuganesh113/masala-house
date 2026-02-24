<?php

namespace App\Http\Requests\Testimonial;

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
 * Class TestimonialRequest
 */
class TestimonialRequest extends FormRequest
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
            'member_message_id' => ['nullable', Rule::exists(DBTables::MEMBER_MESSAGES, 'id')],
            'name' => ['required', 'max:255'],
            'image' => ['nullable', File::types(Mimes::IMG)->max(Max::IMAGE)],
            'message' => ['required'],
            'status' => ['required', Rule::in(Status::getValues())],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only(['member_message_id','name','message','status']);

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::TESTIMONIALS_PATH);
        }

        return $response;
    }
}
