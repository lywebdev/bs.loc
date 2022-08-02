<?php

namespace App\Http\Controllers;

use App\Models\Attribute\Attribute;
use App\Models\Attribute\CategoryLink;
use App\Models\Category\Category;
use App\Models\Slug;
use App\Services\SlugService\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    public function index()
    {
        $slugService = new SlugService();

        $value = 'some value';


        $createdSlug = $slugService->createSlug($value, '-', Slug::class, 'slug', 4);

        $slug = Slug::create(['value' => $value, 'slug' => $createdSlug]);
        echo $createdSlug;
    }
}
