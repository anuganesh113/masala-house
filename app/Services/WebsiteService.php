<?php

namespace App\Services;

use App\Enums\Pagination;
use App\Enums\Status;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\MemberMessage;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Website;

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
        $data['popup'] = Popup::Image()->where('status', Status::ACTIVE)->first();
         $data['events'] = Event::event()->where('status', Status::ACTIVE)->with(['eventfaqs' => function ($q) {
        $q->status();    }])->get();
  

        $alldata = Website::get()->toArray();
        $arrangedData = array_column($alldata, 'value', 'name');
        $data['settings'] = $arrangedData;

        if (isset($arrangedData['section_2_menu']) && $arrangedData['section_2_menu']) {
            $ids = array_slice(json_decode($arrangedData['section_2_menu'], true), 0, 4);

            $data['section_2'] = Menu::whereIn('id', $ids)
                ->status()
                ->get();
        } else {
            $data['section_2'] = Menu::status()->take(4)->get();
        }

        if (isset($arrangedData['section_3_menu']) && $arrangedData['section_3_menu']) {
            $arrangedData['section_3_menu'] = json_decode($arrangedData['section_3_menu'], true);
            foreach ($arrangedData['section_3_menu'] as $key => $value) {
                $data['section_3'][$key] = Menu::where('id', $value)->status()->first();
            }
        } else {
            $data['section_3'] = Menu::status()->get();
        }






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
                    // ->whereNotNull('member_message_id')
                    ->select(['id', 'member_message_id', 'name', 'designation', 'message'])
                    ->where('status', Status::ACTIVE)
                    ->inRandomOrder()->take(5)
                    ->get();
                break;

            case 'blogs':
                $data['categories'] = Category::query()->get();
                $data['blogs'] = Blog::query()->select(['id', 'tag', 'name', 'slug', 'image'])->paginate(Pagination::MEDIUM_PAGE);
                $data['compliments'] = Testimonial::query()
                    ->status()
                    // ->whereNotNull('member_message_id')

                    ->select(['id', 'name', 'designation', 'message'])
                    ->get();
                $data['videos'] = Popup::Video()->first();
                break;

            case 'faqs':
                $data['faqs'] = FAQ::query()->status()->whereNull('model_id')->orderBy('order')->get();
                break;

            case 'gallery':
                $data['albums'] = Album::query()->with(['gallery'])->orderBy('order')->get();
                break;

            case 'menu':
                $data['menus'] = Menu::query()->status()->get();
                $data['categories'] = Category::with(['menus' => function ($query) {
                    $query->status();
                }])->get();

                $alldata = Website::get()->toArray();
                $arrangedData = array_column($alldata, 'value', 'name');
                $data['settings'] = $arrangedData;

                if (isset($arrangedData['section_3_menu']) && $arrangedData['section_3_menu']) {
                    $arrangedData['section_3_menu'] = json_decode($arrangedData['section_3_menu'], true);
                    foreach ($arrangedData['section_3_menu'] as $key => $value) {
                        $data['section_3'][$key] = Menu::where('id', $value)->status()->first();
                    }
                } else {
                    $data['section_3'] = Menu::status()->get();
                }

                break;

            case 'catering':
                $data['service'] = getPageBySlug('services');
                $data['services'] = Service::query()->get();
                $data['compliments'] = Testimonial::query()
                    ->with(['member:id,name,designation'])

                    ->select(['id', 'member_message_id', 'name', 'designation', 'message'])
                    ->where('status', Status::ACTIVE)
                    ->inRandomOrder()->take(5)
                    ->get();

                      $data['events'] = Event::catering()->where('status', Status::ACTIVE)->with(['eventfaqs' => function ($q) {
               $q->status();    }])->get();
             
                break;

            default:
                break;
        }

        return $data;
    }
}
