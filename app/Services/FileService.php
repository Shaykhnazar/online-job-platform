<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Image;

class FileService
{
    /**
     *  Upload files to $directory
     *  It is universal function for all file types
     *
     * @param $file
     * @param string $directory
     * @return string
     */
    public static function upload($file, $directory='files')
    {
        $file_orginal_name = $file->getClientOriginalName();
        $file_name         = uniqid().'_'.$file_orginal_name;
        $file_path         = storage_path('/app/public/'.$directory);
        Storage::disk('public')->makeDirectory($directory);
        $file->move($file_path,$file_name);
        $content = $directory.'/'.$file_name;

        return $content;
    }

    /**
     *  Upload only image type files
     *  It is function special for to upload avatar cropped image
     * @param $file
     * @param string $directory
     * @param int $height
     * @param int $width
     * @return string
     */
    public static function uploadCroppedImage($file, $directory='images', $height=213, $width=189): ?string
    {
        Storage::disk('public')->makeDirectory($directory);
        $type      = $file->getClientOriginalExtension();
        $file_name = uniqid() . '.' . $type;
        $content = null;

        if ($type=="jpg" || $type=="jpeg" || $type=="png" || $type=="bmp") {
            Image::make($file)
                ->fit($height, $width, function($constraint) {
                    $constraint->aspectRatio();
                    })
                ->save(storage_path('app/public/'.$directory.'/'.$file_name));
            $content = $directory.'/'.$file_name;
        }

        return $content;
    }

    /**
     * Delete one image
     *
     * @param $file
     * @return void
     */
    public static function imageDeleteFromStorage($file):void
    {
        Storage::disk('public')->delete($file);
    }
}
