<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use App\Models\Album;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

/**
 * class AdminDashboardController
 */
class AdminDashboardController extends BaseController
{
    public function dashboard(): View
    {
        $data['admins'] = Admin::query()->count();
        $data['banners'] = Banner::query()->count();
        $data['categories'] = Category::query()->count();
        $data['menus'] = Menu::query()->count();
        $data['pages'] = Page::query()->count();
        $data['testimonials'] = Testimonial::query()->count();
        $data['galleries'] = Album::query()->count();
        $data['services'] = Service::query()->count();

        return view('admin.pages.dashboard', compact('data'));
    }
}
