<?php

namespace Database\Seeders\FAQ;

use App\Enums\Status;
use App\Models\FAQ;
use Illuminate\Database\Seeder;

/**
 * Class FAQSeeder
 */
class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [];

        foreach ($faqs ?? [] as $key => $faq) {
            FAQ::query()->create([
                ...$faq,
                'order' => ++$key,
                'status' => Status::ACTIVE,
            ]);
        }
    }
}
