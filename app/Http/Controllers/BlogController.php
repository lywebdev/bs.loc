<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::with(['category'])->paginate(20);

        return view('sections.blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $categories = Category::all();
        $post = Post::where('slug', $slug)->with(['category'])->first();
        if (!$post) {
            abort(404, 'Post not found.');
        }

        $title = $post->title . ' | Блог BeltStudio';

        return view('sections.blog.show', compact('post', 'categories', 'title'));
    }
}
