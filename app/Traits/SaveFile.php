<?php
namespace App\Traits;
trait SaveFile
{
    protected function saveImage($file)
    {
        $destinationPath = 'images/';
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path($destinationPath), $fileName);
        return $fileName;
    }
}
