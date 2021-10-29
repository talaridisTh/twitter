<?php

namespace App\Traits;

use App\Models\Media;
use Intervention\Image\Facades\Image;

trait HasImage {

    /**
     * Get media id
     * @param $image
     * @param null $width
     * @param null $height
     * @return null
     */
    public function saveImages($image, $width = null, $height = null)
    {

        if (!$image) {
            return null;
        }
        [$fileName, $ext, $relPath, $path] = $this->getMediaInfo($image);
        $media = Media::create([
            "name" => $fileName,
            "slug" => (new Media())->createSlug($fileName),
            "type" => $image->getMimeType(),
            "ext" => $ext,
            "path" => $relPath . $fileName,
        ]);
        $this->resize($relPath, $image, $width, $height, $path);

        return $media->id;

    }

    /**
     * @param string $relPath
     * @param $image
     * @param mixed $width
     * @param mixed $height
     * @param string $path
     */
    private function resize(string $relPath, $image, mixed $width, mixed $height, string $path): void
    {
        if (!file_exists(public_path($relPath))) {
            mkdir(public_path($relPath), 666, true);
        }
        Image::make($image->getRealPath())->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path);
    }

    /**
     * @param $image
     * @return array
     */
    private function getMediaInfo($image): array
    {
        [$fileName, $ext] = explode(".", $image->getClientOriginalName());
        $relPath = "image/";
        $path = public_path($relPath . $fileName);

        return [$fileName, $ext, $relPath, $path];
    }

}
