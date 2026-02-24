<?php

namespace Database\Seeders\Service;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Authentic Cuisine',
                'image' => 'authentic-cuisine.svg',
                'excerpt' => 'Authentic Indian & Nepali Cuisine prepared by experienced chefs from our Concord kitchen',
                'description' => 'Authentic Indian & Nepali Cuisine prepared by experienced chefs from our Concord kitchen',
            ],
            [
                'name' => 'Quality Ingredients',
                'image' => 'quality-ingredients.svg',
                'excerpt' => 'Freshly Made, High-Quality Ingredients for the best flavors in Contra Costa County',
                'description' => 'Freshly Made, High-Quality Ingredients for the best flavors in Contra Costa County',
            ],
            [
                'name' => 'Flexible Options',
                'image' => 'flexible-options.svg',
                'excerpt' => 'Flexible Menu Options to suit your event needs in Concord and surrounding areas',
                'description' => 'Flexible Menu Options to suit your event needs in Concord and surrounding areas',
            ],
            [
                'name' => 'Professional Service',
                'image' => 'professional-service.svg',
                'excerpt' => 'Full-Service Staff for a Hassle-Free Experience at your East Bay location',
                'description' => 'Full-Service Staff for a Hassle-Free Experience at your East Bay location',
            ],
            [
                'name' => 'Customizable Packages',
                'image' => 'customizable-packages.svg',
                'excerpt' => 'Customizable Packages to Fit Your Event Size & Budget in Concord',
                'description' => 'Customizable Packages to Fit Your Event Size & Budget in Concord',
            ],
            [
                'name' => 'Timely Delivery',
                'image' => 'timely-delivery.svg',
                'excerpt' => 'Punctual delivery and setup throughout Contra Costa County for your peace of mind',
                'description' => 'Punctual delivery and setup throughout Contra Costa County for your peace of mind',
            ],
        ];

        foreach ($services ?? [] as $service) {
            Service::query()->create([...$service, 'slug' => Str::slug($service['name'])]);
        }
    }
}
