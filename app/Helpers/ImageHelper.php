<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{

    public static function imageDecode(string $image, string $folderName)
    {
        if (!$image)
            return;

        $exploded = explode(",", $image);
        if (!$exploded[0] || !$exploded[1])
            return;

        $ext = self::getExtensionFile($exploded[0]);
        if (!$ext)
            return;

        $decode = base64_decode($exploded[1]);

        $filename = self::generateRandomFileName($ext);

        $path = "public/" . $folderName ."/" . $filename;

        if (Storage::put($path, $decode))
            return substr(Storage::url($path) , 1);
    }

    private static function getExtensionFile(string $content)
    {
        $ext = explode(';', explode("/", $content)[1]);
        return $ext[0] ?? null;
    }

    private static function generateRandomFileName(string $ext)
    {
        return rand() . time() . "." . $ext;
    }
}
