<?php

namespace Database\Seeders\General;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class CopyFoldersFromSiteAssetsToUploads
 */
class CopyFoldersFromSiteAssetsToUploads extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public_path')->deleteDirectory('uploads');
        File::copyDirectory(
            Storage::disk('public_path')->path('site-assets/uploads'),
            Storage::disk('public_path')->path('uploads')
        );
    }
}
