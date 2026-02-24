<?php

namespace App\View\Components\Admin;

use App\Enums\Max;
use App\Enums\Mimes;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class ImageField
 */
class ImageField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected ?array $data = []) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $this->data['label'] ??= 'Image';
        $this->data['name'] ??= 'image';
        $this->data['required'] ??= false;
        $this->data['value'] ??= false;
        $this->data['full_path'] = data_get($this->data, 'value')
            ? asset(data_get($this->data, 'path').data_get($this->data, 'value'))
            : null;
        $this->data['mimes'] ??= Mimes::IMG;
        $this->data['max'] = strtoupper(data_get($this->data, 'max', Max::IMAGE));
        $this->data['accept'] = data_get($this->data, 'mimes')
            ? allowedExtensions(explode(',', data_get($this->data, 'mimes')), data_get($this->data, 'type', 'image'))
            : allowedExtensions(explode(',', Mimes::IMG), data_get($this->data, 'type', 'image'));

        return view('components.admin.image-field', $this->data);
    }
}
