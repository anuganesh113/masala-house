<?php

use App\Http\Controllers\Website\WebsiteAjaxController;
use App\Http\Controllers\Website\WebsiteController;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

require_once __DIR__.'/admin.php';

require_once __DIR__.'/auth.php';


Route::get('/cmd', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return redirect()
        ->back()
        ->with('success', 'Cache cleared successfully!');
});


Route::group(['as' => 'site.'], function ($route) {

    $route->controller(WebsiteController::class)->group(function ($route) {
        $route->get('/', 'index')->name('index');
        $route->get('search', 'search')->name('search');
        $route->view('checkout', 'site.pages.checkout')->name('checkout');
        $route->get('blog/{slug}', 'blog')->name('blog');
        $route->get('{page}', 'page')->name('page');
          $route->post('catering-booking', 'cateringBooking')->name('catering.booking');
          $route->post('contact-store', 'contactsave')->name('contact.save');
        $route->post('table-book', 'tablebook')->name('table.book');
        $route->get('product/{slug}', 'product')->name('product');




        
    });

    $route->controller(WebsiteAjaxController::class)->group(function ($route) {
        $route->post('inquiry', 'inquiry')->name('inquiry');
    });

});



Route::get('/products/{id}', function ($id) {
    $product = Menu::find($id);

    if (!$product) {
        abort(404);
    }

    // Generate slug from product name
    $pattern = '/[\/\s\(\)]+/';
    $slug = preg_replace_callback($pattern, function ($matches) {
        return '-';
    }, $product->name);
    $slug = strtolower(trim($slug, '-'));

    // Save slug -> id mapping to a local JSON file
    $filePath = storage_path('app/slug_mappings.json');
    $mappings = [];
    if (file_exists($filePath)) {
        $mappings = json_decode(file_get_contents($filePath), true) ?? [];
    }
    $mappings[$slug] = $id;
    file_put_contents($filePath, json_encode($mappings, JSON_PRETTY_PRINT));

    return redirect()->route('site.product', ['slug' => $slug]);
})->name('product.old');