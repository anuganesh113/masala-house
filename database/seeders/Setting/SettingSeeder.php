<?php

namespace Database\Seeders\Setting;

use App\Models\Setting;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * Class SettingSeeder
 */
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->create([
            'name' => 'Masala House',
            'white_logo' => 'white-logo.png',
            'color_logo' => 'color-logo.png',
            'email' => 'masalahouseconcord@gmail.com',
            'contact' => '(925) 490-3344',
            'phone' => '(925) 490-3344',
            'address' => '2118 Willow Pass Rd. Ste. 400, Concord, CA 94520',
            'footer_text' => 'Authentic Indian Cuisine & Street Foods serving the Concord community and Contra Costa County with passion and flavor.',
            'metadata' => [
                'google_map_address' => 'https://maps.app.goo.gl/knDYzasukNwPCNgQA',
                'google_map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3145.0282342649807!2d-122.03360680000002!3d37.976470400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808567ea99134c93%3A0x6b28e690072aa4a1!2sMasala%20House!5e0!3m2!1sen!2snp!4v1756371479215!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                // 'pan_no' => null,
                /*'title' => ['Website Visit', 'Projects Completed', 'Years Experience', 'Client Satisfaction'],
                'count' => [74291, 450, 10, 98],
                'unit' => ['+', '+', '+', '%'],*/
            ],
            'social' => [
                'facebook' => 'https://www.facebook.com/masalahouseconcord',
                'instagram' => 'https://www.instagram.com/masalahouseconcord/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://linkedin.com/',
            ],
        ]);
    }
}
