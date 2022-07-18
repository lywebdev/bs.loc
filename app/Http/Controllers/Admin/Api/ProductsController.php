<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Product\Photo;
use App\Services\MediaService\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends BaseController
{
    public function photoDestroy(int $photoId)
    {
        $photo = Photo::find($photoId);
        if (Storage::disk('public')->exists($photo->filename)) {
            Storage::disk('public')->delete($photo->filename);
        }
        $photo->delete();

        return $this->sendResponse([], 'Successful.');
    }
}
