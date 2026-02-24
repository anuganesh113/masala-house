<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminResetPasswordController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\EditorUploadController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\MemberMessageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function ($route) {

    $route->get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');

    $route->group(['middleware' => ['guest:admin', 'auth.session']], function ($route) {
    $route->post('checked', [AdminLoginController::class, 'login'])->name('checked');


        /********************************** AdminLogin Controller Route ********************************/
        // $route->controller(AdminLoginController::class)->group(function ($route) {
        //     $route->get('/', 'showLoginForm')->name('showLoginForm');
        //     $route->post('/', 'login')->name('login');
        // });

        /********************************** AdminForgotPassword Controller Route ********************************/
        $route->controller(AdminForgotPasswordController::class)->group(function ($route) {
            $route->get('password/reset', 'showLinkRequestForm')->name('showLinkRequestForm');
            $route->post('password/email', 'sendResetLinkEmail')->name('sendResetLinkEmail');
        });

        /********************************** AdminResetPassword Controller Route ********************************/
        $route->controller(AdminResetPasswordController::class)->group(function ($route) {
            $route->get('password/reset/{token}', 'showResetForm')->name('showResetForm');
            $route->post('password/reset', 'reset')->name('reset');
        });

    });

    $route->group(['middleware' => ['auth:admin']], function ($route) {

        /********************************** AdminLogin Controller Route ********************************/
        $route->controller(AdminLoginController::class)->group(function ($route) {
            $route->post('logout', 'logout')->name('logout');
            $route->get('change-password', 'changePassword')->name('change.password');
            $route->post('change-password', 'updatePassword')->name('update.password');
        });
    });

    $route->group(['middleware' => 'auth:admin'], function ($route) {

        /********************************** Dashboard Controller Route ********************************/
        $route->get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

        $route->resource('admins', AdminController::class)->except(['show']);

        $route->resource('advertises', AdvertiseController::class)->except(['show']);

        $route->resource('blogs', BlogController::class)->except(['show']);

        $route->resource('banners', BannerController::class)->except(['show']);

        $route->resource('brands', BrandController::class)->except(['show']);

        /********************************** Contact Controller Route ********************************/
        $route->controller(ContactController::class)->group(function ($route) {
            $route->get('contacts', 'index')->name('contacts');
            $route->get('contact/{contact}/view', 'create')->name('contact.view');
            $route->post('contact/{contact}/delete', 'delete')->name('contact.delete');
        });

        /********************************** Courses Controller Route ********************************/
        $route->controller(EditorUploadController::class)->group(function ($route) {
            $route->post('editor-upload', 'editorUpload')->name('editorUpload');
        });

        $route->resource('facilities', FacilityController::class)->except(['show']);

        $route->resource('categories', CategoryController::class)->except(['show']);

        $route->resource('galleries', GalleryController::class)->except(['show']);
        $route->post('gallery/{album}/{gallery}/delete', [GalleryController::class, 'destroyGallery'])
            ->name('galleries.destroy.image');

        /********************************** Inquiry Controller Route ********************************/
        $route->controller(InquiryController::class)->group(function ($route) {
            $route->get('inquiries', 'index')->name('inquiries');
            $route->post('inquiry/{inquiry}/delete', 'delete')->name('inquiry.delete');
        });

        $route->resource('menus', MenuController::class)->except(['show']);
        $route->resource('members', MemberMessageController::class)->except(['show']);

        $route->resource('pages', PageController::class)->except(['show']);
        $route->delete('pages/{page}/delete-image', [PageController::class, 'deleteImage']);

        $route->resource('services', ServiceController::class)->except(['show']);

        $route->controller(SettingController::class)->group(function ($route) {
            $route->get('setting', 'setting')->name('setting');
            $route->post('setting', 'update')->name('update');
        });

        $route->resource('testimonials', TestimonialController::class)->except(['show']);
    });
});
