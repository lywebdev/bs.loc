<?php

namespace App\Http\Controllers\Admin\Api\Attributes;

use App\Http\Controllers\Admin\Api\BaseController;
use App\Models\Attribute\Attribute;
use App\Models\Attribute\CategoryLink;
use Illuminate\Http\Request;

class AttributesController extends BaseController
{
    public function getAttributesByCategory(Request $request)
    {
        $categoryId = (int) $request->categoryId;

        $attributesIds = CategoryLink::where('category_id', $categoryId)->get()->pluck('attribute_id')->toArray();
        $attributes = Attribute::whereIn('id', $attributesIds)->with(['values'])->get();

        return $this->sendResponse([
            'attributes' => $attributes
        ], 'Successful.');
    }
}
