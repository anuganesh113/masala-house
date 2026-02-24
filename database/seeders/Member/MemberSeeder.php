<?php

namespace Database\Seeders\Member;

use App\Models\MemberMessage;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Chef Raj Sharma',
                'designation' => 'Founder and Head Chef',
                'message' => '<p>Chef Raj Sharma, a Delhi-born culinary expert, is the founder and head chef of Masala House in Concord, California. Inspired by the traditional recipes of his grandmother, he developed a passion for authentic Indian cooking rooted in the use of freshly ground spices and time-honored techniques. Since opening Masala House in 2015, Chef Sharma has remained dedicated to delivering the true essence of Indian cuisine, blending vibrant flavors with carefully sourced ingredients. His philosophy centers on authenticity, quality, and hospitality—ensuring that every guest experiences not just a meal, but the warmth and richness of India’s food culture.</p>',
                'image' => 'chef-arjun-patel.png',
            ],
            [
                'name' => 'Priya Sharma',
                'designation' => 'Restaurant Manager',
                'message' => '<p>Priya ensures that every guest has an exceptional dining experience from the moment they walk through our doors.</p>',
                'image' => 'priya-sharma.png',
            ],
            [
                'name' => 'Chef Arjun Patel',
                'designation' => 'Tandoor Specialist',
                'message' => '<p>Arjun is a master of the tandoor, creating perfectly cooked naan, kebabs, and other tandoori specialties.</p>',
                'image' => 'chef-raj-sharma.png',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            MemberMessage::query()->create($testimonial);
        }
    }
}
