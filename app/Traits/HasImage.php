<?php

namespace App\Traits;

use App\Models\Media;
use Intervention\Image\Facades\Image;

trait HasImage {

    public function saveImages($image, $width = null, $height = null)
    {

        //TODO: VALIDATE (section 3 )
        if (!$image) {
            return null;
        }
        [$fileName, $ext] = explode(".", $image->getClientOriginalName());
        $relPath = "image/";
        $path = public_path($relPath . $fileName);
        $media = Media::create([
            "name" => $fileName,
            "slug" => (new Media())->createSlug($fileName),
            "type" => $image->getMimeType(),
            "ext" => $ext,
            "path" => $relPath . $fileName,
        ]);
        if (!file_exists(public_path($relPath))) {
            mkdir(public_path($relPath), 666, true);
        }
        Image::make($image->getRealPath())->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path);

        return $media->id;

    }

}
