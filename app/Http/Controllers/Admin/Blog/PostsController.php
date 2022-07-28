<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->with(['category'])->paginate(100);

        return view('admin.sections.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.sections.blog.posts.create', compact('categories'));
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
