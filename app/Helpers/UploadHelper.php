<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class UploadHelper
{
    /**
     * Upload files to storage
     * 
     * @param object $uploaded_file
     * @param string $directory_name
     * 
     * @return string
     */

    public static function handleUpload(object $uploaded_file, string $directory_name): string
    {
        return $uploaded_file->store($directory_name, 'public');
    }

    /**
     * Remove file from storage
     * 
     * @param string $filename
     * 
     * @return bool
     */

    public static function handleRemove(string $filename): bool
    {
        return Storage::delete('public/' . $filename);
    }
}
