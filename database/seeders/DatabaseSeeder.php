<?php

namespace Database\Seeders;

use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Banner\BannerSeeder;
use Database\Seeders\FAQ\FAQSeeder;
use Database\Seeders\General\CopyFoldersFromSiteAssetsToUploads;
use Database\Seeders\Member\MemberSeeder;
use Database\Seeders\Page\PageSeeder;
use Database\Seeders\Service\ServiceSeeder;
use Database\Seeders\Setting\SettingSeeder;
use Illuminate\Database\Seeder;

/**
 * class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            BannerSeeder::class,
            FAQSeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            ServiceSeeder::class,
            MemberSeeder::class,
            CategoriesTableSeeder::class,
            MenusTableSeeder::class,

            // Delete "public/uploads" directory and copy "public/site-assets/uploads" to "public"
            CopyFoldersFromSiteAssetsToUploads::class,
        ]);
        $this->call(CategoriesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}
