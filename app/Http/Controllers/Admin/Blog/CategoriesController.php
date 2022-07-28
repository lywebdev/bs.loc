<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CategoryStoreRequest;
use App\Models\Blog\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(100);

        return view('admin.sections.blog.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.sections.blog.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = $request->get('category');

        Category::new($category['name']);

        return redirect()->route('admin.blog.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.sections.blog.categories.edit', compact('category'));
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $requestCategory = $request->get('category');
        $category->update($requestCategory);

        return redirect()->back()->with('success', 'Изменения сохранены');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.blog.categories.index')->with('success', 'Категория удалена');
    }
}
