<?php

namespace App\View\Components\Admin;

use App\Enums\Status;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class RadioStatus
 */
class RadioStatus extends Component
{
    /**
     * Create a new component instance.
     *
     *
     * @return void
     */
    public function __construct(
        protected ?array $data = []
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $this->data['value'] = $this->data['value'] ?? Status::INACTIVE;

        return view('components.admin.radio-status', $this->data);
    }
}
