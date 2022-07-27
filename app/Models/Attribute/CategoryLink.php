<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLink extends Model
{
    use HasFactory;

    protected $table = 'attribute_categories_links';

    public $timestamps = false;

    protected $guarded = [];


    public static function new(int $attributeId, int $categoryId): CategoryLink
    {
        return self::create([
            'attribute_id' => $attributeId,
            'category_id' => $categoryId
        ]);
    }
}
