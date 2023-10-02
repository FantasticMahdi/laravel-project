<?php

namespace App\Http\Services\Image;

use Intervention\Image\Facades\Image;

class ImageService extends ImageToolsService
{
    public function save($image)
    {

        // set image
        $this->setImage($image);

        //execute provider
        $this->provider();

        //save image
        $result = Image::make($image->getRealPath())->save(public_path($this->getImageAddress()), null, $this->getImageFormat());
        return $result ? $this->getImageAddress() : false;
    }

    public function fitAndSave($image, $width, $height)
    {
        // set image
        $this->setImage($image);

        //execute provider
        $this->provider();

        //save image
        $result = Image::make($image->getRealPath())->fit($width, $height)->save(public_path($this->getImageAddress()), null, $this->getImageFormat());
        return $result ? $this->getImageAddress() : false;
    }
}
