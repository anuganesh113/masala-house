<?php

use App\Constants\General;
use App\Enums\UploadFilePath;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

if (!function_exists('setting')) {
    function setting(): ?Setting
    {
        return Setting::first();
    }
}

if (!function_exists('appName')) {
    function appName(): ?string
    {
        return data_get(setting(), 'name', envName());
    }
}

if (!function_exists('currentUser')) {
    function currentUser(): ?Authenticatable
    {
        return auth()->user();
    }
}

if (!function_exists('adminProfileUrl')) {
    function adminProfileUrl(): string
    {
        $user = currentUser();

        if (isset($user) && !empty(data_get($user, 'profile'))) {
            return asset(sprintf('%s%s', UploadFilePath::ADMINS_PATH, data_get($user, 'profile')));
        }

        return asset(sprintf('%s%s', UploadFilePath::ADMINS_PATH, General::DEFAULT_ADMIN));
    }
}


if (!function_exists('allowedExtensions')) {
    function allowedExtensions(array $extensions, string $type = 'image'): string
    {
        return implode(',', array_map(function ($ext) use ($type) {
            return sprintf('%s/%s', $type, $ext);
        }, $extensions));
    }
}

if (!function_exists('getPageById')) {
    function getPageById(int $pageId): ?Model
    {
        return Page::query()->find($pageId);
    }
}

if (!function_exists('getPageByTemplate')) {
    function getPageByTemplate(string $template): ?Model
    {
        return Page::query()->where(['template' => $template])->first();
    }
}

if (!function_exists('getPageBySlug')) {
    function getPageBySlug(string $template): ?Model
    {
        return Page::query()->where(['slug' => $template])->first();
    }
}

if (!function_exists('pages')) {
    function pages(): array|Collection
    {
        return Page::query()
            ->status()
            ->with('child', function ($query) {
                $query->select(['id', 'page_id', 'name', 'slug', 'template', 'order'])->orderBy('order');
            })
            ->select(['id', 'page_id', 'name', 'slug', 'template'])
            ->whereNull('page_id')
            ->orderBy('order')
            ->get()->toArray();
    }
}

if (!function_exists('getYoutubeVideoIdFromLink')) {
    function getYoutubeVideoIdFromLink($links): ?array
    {
        preg_match_all(General::YOUTUBE_SHARE_LINK_REGEX, $links, $matches);

        return array_unique($matches[1]);
    }
}

if (!function_exists('requesturl')) {
    function requesturl(): string
    {
        $settings = setting(); // Call the function first

        if (isset($settings) && data_get($settings, 'social.ordernow')) {
            return data_get($settings, 'social.ordernow');
        } else {
            return request()->url();
        }
    }
}
if (!function_exists('footerPages')) {
    function footerPages(): array|Collection
    {
        return Page::query()
            ->status()
            ->select(['id', 'name', 'slug'])
            ->whereNull('page_id')
            ->orderBy('order')
            ->get();
    }
}

if (!function_exists('checkVegetarian')) {
    function checkVegetarian($item): bool|string
    {
        if (isset($item) && $item == 'veg') {
            return 'Vegetarian';
        }

        return 'Non-Vegetarian';
    }
}


if (!function_exists('cssnonveg')) {
    function cssnonveg($item): bool|string
    {
        if (isset($item) && $item == 'veg') {
            return '';
        }

        return 'cssnonveg';
    }
}





function getidVideo($link)
{
    // Regex pattern to match YouTube video IDs from common URL formats
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([^"&?\/\s]{11})/i';

    if (preg_match($pattern, $link, $matches)) {
        // The video ID is captured in the first capturing group
        return isset($matches[1]) ? $matches[1] : null;
    }
    return 'Ggngkm9qgdw';
}


