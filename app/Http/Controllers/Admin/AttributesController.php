<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\AttributeStoreRequest;
use App\Models\Attribute\Attribute;
use App\Models\Attribute\CategoryLink;
use App\Models\Attribute\Value;
use App\Models\Category\Category;
use App\Services\AttributesService\AttributesService;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function index()
    {
        $attributes = Attribute::orderBy('id', 'desc')->paginate(100);

        return view('admin.sections.attributes.index', compact('attributes'));
    }

    public function create()
    {
        $attributesTypes = AttributesService::getAttributesTypes();
        $categories = Category::all();

        return view('admin.sections.attributes.create', compact('attributesTypes', 'categories'));
    }

    public function store(AttributeStoreRequest $request)
    {
        $attribute = $request->get('attribute');

        try {
            $createdAttribute = Attribute::new(
                $attribute['name'],
                $attribute['frontend_type'],
                $attribute['fullname'] ?? null
            );
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Не удалось добавить характеристику');
        }

        $attributeValues = $request->attributeValues;
        if (!empty($attributeValues)) {
            $attributeValuesArray = [];

            foreach ($attributeValues as $attributeValue) {
                if (empty($attributeValue)) {
                    continue;
                }

                $attributeValuesArray[] = [
                    'attribute_id' => $createdAttribute->id,
                    'value' => $attributeValue
                ];
            }

            Value::insert($attributeValuesArray);
        }

        $attributeCategories = $request->attributeCategories;
        if (!is_null($attributeCategories)) {
            $categoryLinkData = [];

            foreach ($attributeCategories as $categoryId) {
                $categoryLinkData[] = [
                    'attribute_id' => $createdAttribute->id,
                    'category_id' => $categoryId
                ];
            }

            CategoryLink::insert($categoryLinkData);
        }


        return redirect()->route('admin.attributes.index')->with('success', 'Характеристика добавлена');
    }

    public function edit(Attribute $attribute)
    {
        $attribute->load(['values', 'categories']);
        $attributesTypes = AttributesService::getAttributesTypes();
        $categories = Category::all();
        $attributeCategoriesIds = $attribute->categories->pluck('category_id')->toArray();

        return view('admin.sections.attributes.edit', compact('attribute', 'attributesTypes', 'categories', 'attributeCategoriesIds'));
    }

    public function update(Attribute $attribute, AttributeStoreRequest $request)
    {
        $requestAttribute = $request->get('attribute');
        $attribute->update($requestAttribute);

        // Обновление значений характеристики
        $requestAttributeValues = $request->attributeValues;
        $attributeValuesInDb = $attribute->values->pluck('value')->toArray();
        foreach ($requestAttributeValues as $attributeValue) {
            if (is_null($attributeValue)) {
                continue;
            }

            if (!in_array($attributeValue, $attributeValuesInDb)) {
                Value::new($attribute->id, $attributeValue);
            }
        }

        foreach ($attribute->values as $attributeValueRow) {
            if (!in_array($attributeValueRow->value, $requestAttributeValues)) {
                $attributeValueRow->delete();
            }
        }

        // Обновление привязанных категорий
        $requestAttributeCategories = $request->attributeCategories;
        $attributeCategoriesIdsInDb = $attribute->categories->pluck('category_id')->toArray();
        foreach ($requestAttributeCategories as $attributeCategoryId) {
            if (is_null($attributeCategoryId)) {
                continue;
            }

            if (!in_array($attributeCategoryId, $attributeCategoriesIdsInDb)) {
                CategoryLink::new($attribute->id, $attributeCategoryId);
            }
        }

        foreach ($attribute->categories as $attributeCategoryRow) {
            if (!in_array($attributeCategoryRow->category_id, $requestAttributeCategories)) {
                $attributeCategoryRow->delete();
            }
        }


        return redirect()->back()->with('success', 'Изменения сохранены');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('admin.attributes.index')->with('success', 'Характеристика удалена');
    }
}
