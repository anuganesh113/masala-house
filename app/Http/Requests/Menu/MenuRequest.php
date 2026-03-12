<?php

namespace App\Http\Requests\Menu;

use App\Constants\DBTables;
use App\Enums\FoodType;
use App\Enums\Max;
use App\Enums\MenuCategory;
use App\Enums\Mimes;
use App\Enums\Status;
use App\Enums\UploadFilePath;
use App\Traits\FileUpload;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

/**
 * Class MenuRequest
 */
class MenuRequest extends FormRequest
{
    use FileUpload;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->slug ? $this->slug :  Str::slug($this->name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $id = $this->menu->id ?? '';
        return [
            'category_id' => ['required', Rule::exists(DBTables::CATEGORIES, 'id')],
            'name' => [
                'required',
                'max:255',
                Rule::unique(DBTables::MENUS)->ignore($this->route()->parameter('menu')),
            ],
            'image' => [
                'nullable',
                File::types(Mimes::IMG)->max(Max::IMAGE),
            ],
            'slug' => 'required|max:255|unique:menus,slug,' . $id,
            'image_alt' => ['nullable', 'max:255'],
            'old_price' => ['nullable', 'numeric', 'min:1', 'gt:price'],
            'price' => ['required', 'numeric', 'min:1'],
            'type' => ['required', Rule::in(FoodType::getValues())],
            'status' => ['required', Rule::in(Status::getValues())],
        ];
    }

    public function prepareData(): array
    {
        $response = $this->only(['category_id', 'slug', 'name', 'image_alt', 'excerpt', 'description', 'old_price', 'price', 'type', 'status', 'seo']);

        if ($this->hasFile('image')) {
            $response['image'] = $this->uploadImage($this->file('image'), UploadFilePath::MENUS_PATH);
        }

        return $response;
    }
}
