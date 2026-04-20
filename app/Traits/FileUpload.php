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
    /**
     * Get the full storage path for a relative path
     */
    protected static function getFullPath(string $path): string
    {
        // Remove any leading/trailing slashes and ensure we have a clean path
        $path = trim($path, '/');
        return public_path($path);
    }

    /**
     * Check or create directory
     */
    public static function checkOrCreateDirectory(string $upload_path): void
    {
        $fullPath = self::getFullPath($upload_path);
        
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0777, true);
        }
    }

    /**
     * Upload and process image
     */
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

        // Get the full path for saving
        $fullPath = self::getFullPath($path);
        
        // Ensure the directory exists
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0777, true);
        }

        // Save the image
        $pics->save($fullPath . '/' . $file_name);

        return $file_name;
    }

    /**
     * Upload image with directory check
     */
    public static function uploadImage(UploadedFile $file, string $path, ?int $widen = null): string
    {
        return self::upload($file, $path, $widen);
    }

    /**
     * Upload regular file (not image)
     */
    public static function fileUpload(UploadedFile $file, string $path): string
    {
        $file_name = sprintf(
            '%s-%s.%s',
            General::PREFIX_FILE_NAME,
            Str::slug(Str::random(11)),
            $file->extension()
        );

        // Get the full path for moving the file
        $fullPath = self::getFullPath($path);
        
        // Ensure the directory exists
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0777, true);
        }

        // Move the file to the destination
        $file->move($fullPath, $file_name);

        return $file_name;
    }

    /**
     * Upload multiple images
     */
    public static function multipleImageUpload(array $files, string $path, ?int $widen = null): array
    {
        $images = [];

        if (empty($files)) {
            return $images;
        }

        $fullPath = self::getFullPath($path);
        
        // Ensure the directory exists
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0777, true);
        }

        foreach ($files ?? [] as $file) {
            try {
                $images[] = self::upload($file, $path, $widen);
            } catch (Exception $error) {
                // Clean up on failure
                foreach ($images ?? [] as $image) {
                    @unlink($fullPath . '/' . $image);
                }
                throw $error;
            }
        }

        return $images;
    }

    /**
     * Get the full URL for an uploaded file
     */
    public static function getUploadUrl(string $path, string $filename): string
    {
        return asset($path . '/' . $filename);
    }

    /**
     * Delete an uploaded file
     */
    public static function deleteUploadedFile(string $path, string $filename): bool
    {
        $fullPath = self::getFullPath($path) . '/' . $filename;
        
        if (File::exists($fullPath)) {
            return File::delete($fullPath);
        }
        
        return false;
    }

    /**
     * Check if file exists
     */
    public static function fileExists(string $path, string $filename): bool
    {
        $fullPath = self::getFullPath($path) . '/' . $filename;
        return File::exists($fullPath);
    }
}