<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class seo
 */
class seo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(protected array $data) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.admin.seo', ['data' => $this->data]);
    }
}
