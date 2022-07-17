<?php

namespace App\Services\MediaService;

use Illuminate\Support\Facades\Storage;

class MediaService
{
    private $data;
    private $fileCopy;

    public function __construct(string $data)
    {
        $this->fileCopy = $data;
        $this->data = substr($data, 1 + strpos($data, ','));
    }

    public function store($path)
    {
        $format = explode('/', explode(';', $this->fileCopy)[0])[1];
        $filepath = "$path.$format";

        $file = base64_decode($this->data);
        Storage::disk('public')->put($filepath, $file);

        return $filepath;
    }

    public function remove(?string $path)
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }

    public static function deleteDir(string $path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }
    }
}
