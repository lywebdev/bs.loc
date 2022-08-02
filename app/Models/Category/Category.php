<?php

namespace App\Models\Category;

use App\Models\Product\Product;
use App\Services\SlugService\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;


class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $table = 'categories';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * @param string $name Название категории
     * @param int|null $parentId
     * @return Category
     */
    public static function new(string $name, ?int $parentId = null): Category
    {
        return self::create([
            'name' => $name,
            'parent_id' => $parentId
        ]);
    }


    // Relations

    /**
     * Товары категории
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $slugService = new SlugService();
            $category->slug = $slugService->createSlug($category->name, '-', self::class, 'slug', $category->parent_id);
        });
    }
}
