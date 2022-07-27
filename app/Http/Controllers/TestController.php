<?php

namespace App\Http\Controllers;

use App\Models\Attribute\Attribute;
use App\Models\Attribute\CategoryLink;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $attributesIds = CategoryLink::where('category_id', 1)->get()->pluck('attribute_id')->toArray();
        $attributes = Attribute::whereIn('id', $attributesIds)->with(['values'])->get();
    }
}
