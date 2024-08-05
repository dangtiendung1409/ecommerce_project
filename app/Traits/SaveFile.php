<?php
namespace App\Traits;

use Illuminate\Http\File;

trait SaveFile
{
    protected function saveImage($file, $previousImagePath = '', $path = 'images')
    {
        $destinationPath = $path;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path($destinationPath), $fileName);
        return $fileName;
    }
}


