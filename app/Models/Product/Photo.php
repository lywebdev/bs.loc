<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'products_photos';

    public $timestamps = false;

    protected $guarded = [];


    public function new(int $productId, string $filename, ?int $sort = 0)
    {
        return self::create([
            'product_id' => $productId,
            'filename' => $filename,
            'sort' => $sort
        ]);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
