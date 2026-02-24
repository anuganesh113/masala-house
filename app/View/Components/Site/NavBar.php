<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class NavBar
 */
class NavBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.site.nav-bar', ['pages' => pages()]);
    }
}
