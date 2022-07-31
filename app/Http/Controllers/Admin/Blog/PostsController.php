<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostStoreRequest;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(PostStoreRequest $request)
    {
        $title = $request->title;
        $content = $request->get('content');
        $seoKeywords = $request->seo_keywords;
        $seoDescription = $request->seo_description;
        $status = $request->status;
        $categoryId = $request->category_id;

        $createdPost = Post::new($title, $content, $status, $categoryId, $seoKeywords, $seoDescription);

        $preview = $request->post['preview'] ?? null;
        if ($preview) {
            $preview = Storage::disk('public')->put('uploads/blog/posts/' . $createdPost->id, $preview);

            $createdPost->preview = $preview;
            $createdPost->save();
        }


        return redirect()->route('admin.blog.posts.index')->with('success', 'Пост добавлен');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.sections.blog.posts.edit', compact('categories', 'post'));
    }

    public function update(Post $post, PostStoreRequest $request)
    {
        $title = $request->title;
        $content = $request->get('content');
        $seoKeywords = $request->seo_keywords;
        $seoDescription = $request->seo_description;
        $status = $request->status;
        $categoryId = $request->category_id;

        $post->update([
            'title' => $title,
            'content' => $content,
            'seo_keywords' => $seoKeywords,
            'seo_description' => $seoDescription,
            'status' => $status,
            'category_id' => $categoryId
        ]);

        $preview = $request->post['preview'];
        if ($preview) {
            if (Storage::disk('public')->exists($post->preview)) {
                Storage::disk('public')->delete($post->preview);
            }

            $preview = Storage::disk('public')->put('uploads/blog/posts/' . $post->id, $preview);
            $post->preview = $preview;
            $post->save();
        }

        return redirect()->back()->with('success', 'Изменения сохранены');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.blog.posts.index')->with('success', 'Пост удалён');
    }
}
