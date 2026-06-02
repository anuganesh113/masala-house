<?php

namespace App\Http\Controllers\Api;

use App\Constants\General;
use App\Enums\Pagination;
use App\Enums\Status;
use App\Http\Controllers\BaseController;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\FAQ;
use App\Models\MemberMessage;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Popup;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

class PageController extends BaseController
{
    #[OA\Get(
        path: '/api/pages',
        operationId: 'getPages',
        description: 'Returns active parent pages with their active child pages.',
        summary: 'List pages',
        tags: ['Pages'],
        responses: [
            new OA\Response(response: 200, description: 'Pages returned.'),
        ],
    )]
    public function index(): JsonResponse
    {
        $pages = Page::get();

        $about = $pages->filter(function ($item) {
            return $item->slug == 'about';
        })->values();
        $menus = $pages->filter(function ($item) {
            return $item->slug == 'menu';
        })->values();
        $caterings = $pages->filter(function ($item) {
            return $item->slug == 'catering';
        })->values();
        $blogs = $pages->filter(function ($item) {
            return $item->slug == 'blogs';
        })->values();



        return response()->json([
            'about' => $about,
            'menus' => $menus,
            'caterings' => $caterings,
            'blogs' => $blogs,
            'message' => ' Teams category'
        ]);
    }

    #[OA\Get(
        path: '/api/pages/{page}',
        operationId: 'getPage',
        description: 'Returns an active page by ID or slug.',
        summary: 'Show page',
        tags: ['Pages'],
        parameters: [
            new OA\Parameter(
                name: 'page',
                description: 'Page ID or slug',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'string', example: 'about-us'),
            ),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Page returned.'),
            new OA\Response(response: 404, description: 'Page not found.'),
        ],
    )]
    public function show(string $page): JsonResponse
    {
     $page = Page::where('slug', $page)->firstOrFail();
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
                $data['blogs'] = Blog::query()->status()->select(['id', 'tag', 'name', 'slug', 'image'])->paginate(Pagination::MEDIUM_PAGE);
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
             $data['menus'] = Menu::query()->with('category')->status()->get();
                $data['categories'] = Category::orderBy('order')->with(['menus' => function ($query) {
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

                      $data['events'] = Event::catering()->where('status', Status::ACTIVE)->orderBy('order')->take(4)->with(['eventfaqs' => function ($q) {
               $q->status();    }])->get();
             
                break;

            default:
                break;
        }

      return response()->json($data);
    }
}


