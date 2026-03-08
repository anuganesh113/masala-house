<?php

namespace App\Services;

use App\Enums\Pagination;
use App\Enums\Status;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\MemberMessage;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;

/**
 * class WebsiteService
 */
class WebsiteService
{
    public function index(): array
    {
        $data['about'] = getPageBySlug('about');
        $data['wonderful_dining'] = getPageBySlug('wonderful-dining');
        $data['categories'] = Category::with(['menus' => function ($query) {
            $query->status();
        }])->get();
        $data['galleries'] = Gallery::get();
        $data['popup'] = Popup::where('status', Status::ACTIVE)->first();


        return $data;
    }


    public function settings()
    {
        $data = Setting::first();
        return $data;
    }



    public function page(Page $page): array
    {
        $data['page'] = $page;

        switch (data_get($page, 'slug')) {
            case 'about':
                $data['our_story'] = getPageBySlug('our-story');
                $data['welcome'] = getPageBySlug('welcome-to-masala');
                $data['dining_experience'] = getPageBySlug('dining-experiences');
                $data['members'] = MemberMessage::query()->get();
                $data['galleries'] =  Album::with('gallery')->get();
                $data['compliments'] = Testimonial::query()
                    ->with(['member:id,name,designation'])
                    ->whereNotNull('member_message_id')
                    ->select(['id', 'member_message_id', 'name', 'designation', 'message'])
                    ->where('status', Status::ACTIVE)
                    ->inRandomOrder()->take(5)
                    ->get();
                break;

            case 'blogs':
                $data['categories'] = Category::query()->get();
                $data['blogs'] = Blog::query()->select(['id', 'tag', 'name', 'slug', 'image'])->paginate(Pagination::MEDIUM_PAGE);
                $data['compliments'] = Testimonial::query()
                    ->whereNotNull('member_message_id')
                    ->select(['id', 'name', 'designation', 'message'])
                    ->get();
                break;

            case 'faqs':
                $data['faqs'] = FAQ::query()->status()->whereNull('event_id')->orderBy('order')->get();
                break;

            case 'gallery':
                $data['albums'] = Album::query()->with(['gallery'])->orderBy('order')->get();
                break;

            case 'menu':
                $data['menus'] = Menu::query()->status()->get();
                $data['categories'] = Category::with(['menus' => function ($query) {
                    $query->status();
                }])->get();
                break;

            case 'catering':
                $data['service'] = getPageBySlug('services');
                $data['services'] = Service::query()->get();
                $data['compliments'] = Testimonial::query()
                    ->with(['member:id,name,designation'])
                    ->whereNotNull('member_message_id')
                    ->select(['id', 'member_message_id', 'name', 'designation', 'message'])
                    ->where('status', Status::ACTIVE)
                    ->inRandomOrder()->take(5)
                    ->get();
                break;

            default:
                break;
        }

        return $data;
    }
}
