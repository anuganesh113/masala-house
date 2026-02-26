<?php

namespace App\Http\Controllers\Website;

use App\Constants\General;
use App\Enums\Pagination;
use App\Http\Controllers\BaseController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Services\WebsiteService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Mail;

/**
 * class WebsiteController
 */
class WebsiteController extends BaseController
{
    public function __construct(protected WebsiteService $websiteService) {}

    public function index(): View
    {
        $data = $this->websiteService->index();
        return view('site.pages.index', $data);
    }

    public function page(string $page): View|RedirectResponse
    {
        $page = Page::query()->where(['slug' => $page])->firstOrFail();

        if (in_array($page->slug, General::NO_PAGES)) {
            return to_route('site.index');
        }

        $data = $this->websiteService->page($page);
   
     

        return view(sprintf('site.pages.%s', data_get($page, 'template', 'common-page')), $data);
    }

    public function blog(string $slug): View|RedirectResponse
    {
        $data['categories'] = Category::query()->get();
        $blog = Blog::query()->status()
            ->where(['slug' => $slug])
            ->firstOrFail();
        $data['previous'] = Blog::query()->status()
            ->where('id', '<', $blog->id)
            ->select(['id', 'slug'])
            ->first();
        $data['next'] = Blog::query()->status()
            ->where('id', '>', $blog->id)
            ->select(['id', 'slug'])
            ->first();
        $data['similar'] = Blog::query()->status()
            ->whereNot('id', data_get($blog, 'id'))
            ->select(['id', 'name', 'slug', 'image', 'created_at'])
            ->inRandomOrder()
            ->take(Pagination::SMALL_PAGE)
            ->get();

        return view('site.pages.blog', [
            ...$data,
            'blog' => $blog,
        ]);
    }

    public function cateringBooking(Request $request)
    {
       
        $details = [
            'namecatering' => $request->namecatering,
            'name' => $request->name,

            'email' => $request->email,

            'date' => $request->date,
            'time' => $request->time,
            'persons' => $request->Number_of_persons,
            'phone' => $request->phone,
        ];
       Mail::to($request->email)->send(new \App\Mail\Contact($details));
         return redirect()->back()->with('success', 'Successfull!  We will inform you soon');
    }
}
