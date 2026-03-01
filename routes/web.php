<?php

use App\Http\Controllers\Website\WebsiteAjaxController;
use App\Http\Controllers\Website\WebsiteController;
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
          $route->post('contact-store', 'contactStore')->name('contact.store');

    });

    $route->controller(WebsiteAjaxController::class)->group(function ($route) {
        $route->post('inquiry', 'inquiry')->name('inquiry');
    });

});
