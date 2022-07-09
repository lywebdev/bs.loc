<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(15);

        return view('admin.sections.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.sections.categories.create');
    }

    public function store(Request $request)
    {
        $requestCategory = $request->get('category');
        Category::new($requestCategory['name']);

        return redirect()->route('admin.categories.index')->with('success', 'Категория добавлена');
    }

    public function edit(Category $category)
    {
        return view('admin.sections.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $requestCategory = $request->get('category');
        $category->update($requestCategory);

        return redirect()->back()->with('success', 'Изменения сохранены');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена');
    }
}
