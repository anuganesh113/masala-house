<?php

namespace Database\Seeders\Page;

use App\Enums\Status;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * class PageSeeder
 */
class PageSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iteration = 0;
        foreach (config('masala.pages') ?? [] as $page) {

            $parent = Page::query()->create([
                ...Arr::only($page, ['name', 'image_one', 'image_two', 'excerpt', 'description', 'images']),
                'title' => Arr::get($page, 'title', Arr::get($page, 'name')),
                'slug' => Arr::get($page, 'slug', Str::slug(Arr::get($page, 'name'))),
                'template' => Arr::get($page, 'template', 'common-page'),
                'order' => ++$iteration,
                'status' => Arr::get($page, 'status', Status::INACTIVE),
            ]);

            $subIteration = 0;
            foreach (data_get($page, 'sub_page', []) as $sub) {
                $parent->child()->create([
                    ...Arr::only($sub, ['name', 'image_one', 'image_two', 'excerpt', 'description', 'images']),
                    'title' => Arr::get($sub, 'title', Arr::get($sub, 'name')),
                    'slug' => Arr::get($sub, 'slug', Str::slug(Arr::get($sub, 'name'))),
                    'template' => Arr::get($sub, 'template', 'common-page'),
                    'order' => ++$subIteration,
                    'status' => Arr::get($sub, 'status', Status::INACTIVE),
                ]);
            }
        }
    }
}
