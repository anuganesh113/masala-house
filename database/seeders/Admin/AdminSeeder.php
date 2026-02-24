<?php

namespace Database\Seeders\Admin;

use App\Enums\Status;
use App\Models\Admin;
use Illuminate\Database\Seeder;

/**
 * class AdminSeeder
 */
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['name' => 'admin@email.com'],
            [
                'email' => 'admin@email.com',
                'password' => 12345678,
                'status' => Status::ACTIVE,
                'contact' => 9876543210,
            ]
        );
    }
}
