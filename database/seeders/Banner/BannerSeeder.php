<?php

namespace Database\Seeders\Banner;

use App\Models\Banner;
use Illuminate\Database\Seeder;

/**
 * Class BannerSeeder
 */
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'name' => 'Taste of Indian Authentic Spices in California',
                'title' => 'MASALA HOUSE',
                'image' => 'banner-image-1.jpg',
                'status' => 1,
            ],
            [
                'name' => 'Taste of Indian Authentic Spices in California',
                'title' => 'MASALA HOUSE',
                'image' => 'banner-image-2.png',
                'status' => 1,
            ],
        ];

        foreach ($banners as $key => $banner) {
            Banner::query()->create([
                ...$banner,
                'order' => ++$key,
            ]);
        }
    }
}
