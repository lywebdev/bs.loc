<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'blog_posts';

    public $timestamps = false;

    protected $guarded = [];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function new(
        string $title,
        string $content,
        bool $status = true,
        ?int $categoryId,
        ?string $seoKeywords,
        ?string $seoDescription,
        ?string $preview = null
    ) {
        return self::create([
            'title' => $title,
            'content' => $content,
            'preview' => $preview,
            'seo_keywords' => $seoKeywords,
            'seo_description' => $seoDescription,
            'status' => $status,
            'category_id' => $categoryId
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function boot()
    {
        parent::boot();

        static::deleted(function ($post) {
            if (Storage::disk('public')->exists($post->preview)) {
                Storage::disk('public')->delete($post->preview);
            }
        });
    }
}
