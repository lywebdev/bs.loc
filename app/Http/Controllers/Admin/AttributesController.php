<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\AttributeStoreRequest;
use App\Models\Attribute\Attribute;
use App\Services\AttributesService\AttributesService;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function index()
    {
        $attributes = Attribute::paginate(100);

        return view('admin.sections.attributes.index', compact('attributes'));
    }

    public function create()
    {
        $attributesTypes = AttributesService::getAttributesTypes();

        return view('admin.sections.attributes.create', compact('attributesTypes'));
    }

    public function store(AttributeStoreRequest $request)
    {
        $attribute = $request->get('attribute');

        try {
            Attribute::new(
                $attribute['name'],
                $attribute['frontend_type']
            );
        } catch (\Exception $exception) {
            return redirect()->route('admin.attributes.index')->with('error', 'Не удалось добавить характеристику');
        }

        return redirect()->route('admin.attributes.index')->with('success', 'Характеристика добавлена');
    }

    public function edit(Attribute $attribute)
    {
        $attributesTypes = AttributesService::getAttributesTypes();

        return view('admin.sections.attributes.edit', compact('attribute', 'attributesTypes'));
    }

    public function update(Attribute $attribute, AttributeStoreRequest $request)
    {
        $requestAttribute = $request->get('attribute');
        $attribute->update($requestAttribute);

        return redirect()->back()->with('success', 'Изменения сохранены');
    }
}
