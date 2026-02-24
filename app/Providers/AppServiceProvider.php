<?php

namespace App\Providers;

use App\Constants\DBTables;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * class AppServiceProvider
 */
class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Paginator::useBootstrap();

        Blade::directive('datetime', function ($date) {
            return "{{ date('M j, Y', strtotime($date)) }}";
        });

        Blade::directive('datetime_string', function ($date) {
            return "{{ date('M j, Y, g:i a', strtotime($date)) }}";
        });

        Blade::directive('substr', function ($arguments) {
            [$text, $limit] = explode(',', str_replace(['(', ')', ' ', "'"], '', $arguments));

            return "{{ mb_substr(strip_tags($text), 0, $limit, 'utf-8') }}";
        });

        if (! request()->is('admin/*')) {
            if (Schema::hasTable(DBTables::SETTING)) {
                View::share('setting', Setting::query()->first());
            }
        }
    }
}
