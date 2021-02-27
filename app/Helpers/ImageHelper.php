<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

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

        self::createImageFolderIfNotExists($folderName);

        $path = "images/$folderName/" . $filename;

        if (file_put_contents($path, $decode)) {
            return $path;
        }
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

    private static function createImageFolderIfNotExists(string $folderName)
    {
        $imagesFolder = public_path() . "/images/$folderName";
        if (!File::isDirectory($imagesFolder))
            File::makeDirectory($imagesFolder, 0777, true, true);
    }
}
