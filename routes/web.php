<?php

use App\Http\Controllers\Website\WebsiteAjaxController;
use App\Http\Controllers\Website\WebsiteController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

require_once __DIR__.'/admin.php';

require_once __DIR__.'/auth.php';

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
    // Find product by ID and get its slug
    $product = Menu::find($id);
//dd($product);
    $pattern = '/[\/\s\(\)]+/';

$output = preg_replace_callback($pattern, function($matches) {
    // $matches[0] contains the entire text that matched the pattern
    // Let's see what's inside
    return '-';
}, $product->name);

 // dd($output);
$output = strtolower(trim($output, '-'));
 session()->flash('id', $id);

   
    if ($product) {
        // Extract clean slug (remove UUID if exists)
        //$cleanSlug = explode('_', $product->slug)[0];

       
        return redirect()->route('site.product', ['slug' => $output], 301);
    }
    
    // If product not found, redirect to 404 or home
    abort(404);
})->name('product.old');