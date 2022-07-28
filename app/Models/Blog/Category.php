<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'blog_categories';

    public $timestamps = false;

    protected $guarded = [];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public static function new(string $name, ?int $sort = 0): Category
    {
        return self::create([
            'name' => $name,
            'sort' => $sort
        ]);
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
