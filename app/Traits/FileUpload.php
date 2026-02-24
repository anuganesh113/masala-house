<?php

namespace App\Traits;

use App\Constants\General;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

/**
 * Trait FileUpload
 */
trait FileUpload
{
    public static function checkOrCreateDirectory(string $upload_path): void
    {
        File::exists(public_path($upload_path)) || File::makeDirectory(public_path($upload_path), 0777, true);
    }

    public static function upload(UploadedFile $file, string $path, ?int $widen = null): string
    {
        $manager = ImageManager::imagick();

        $pics = ($widen != null) ? $manager->read($file)->scaleDown(width: $widen) : $manager->read($file);

        $file_name = sprintf(
            '%s-%s.%s',
            General::PREFIX_FILE_NAME,
            Str::slug(Str::random(11)),
            $file->extension()
        );

        $pics->save($path.$file_name);

        return $file_name;
    }

    public static function uploadImage(UploadedFile $file, string $path, ?int $widen = null): string
    {
        self::checkOrCreateDirectory($path);

        return self::upload($file, $path, $widen);
    }

    public static function fileUpload(UploadedFile $file, string $path): string
    {
        self::checkOrCreateDirectory($path);

        $file_name = sprintf(
            '%s-%s.%s',
            General::PREFIX_FILE_NAME,
            Str::slug(Str::random(11)),
            $file->extension()
        );

        $file->move($path, $file_name);

        return $file_name;
    }

    public static function multipleImageUpload(array $files, string $path, ?int $widen = null): array
    {
        $images = [];

        if (empty($files)) {
            return $images;
        }

        self::checkOrCreateDirectory($path);

        foreach ($files ?? [] as $file) {
            try {
                $images[] = self::upload($file, $path, $widen);
            } catch (Exception $error) {
                foreach ($images ?? [] as $image) {
                    @unlink(sprintf('%s%s', $path, $image));
                }
            }
        }

        return $images;
    }
}
