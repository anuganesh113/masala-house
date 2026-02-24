<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Banner As BannerModel;

/**
 * class Banner
 */
class Banner extends Component
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
        $banners = BannerModel::query()->select(['id','name','title','image'])->status(1)->orderBy('order')->get();

        return view('components.site.banner', ['banners' => $banners]);
    }
}
