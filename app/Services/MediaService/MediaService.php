<?php

namespace App\Services\MediaService;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaService
{
    private $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function getImageInstanceByBlob()
    {
        return Image::make($this->data);
    }

    public function store($path, $file)
    {
        return Storage::disk('public')->put($path, $file);
    }

    public function remove(?string $path)
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }
}
