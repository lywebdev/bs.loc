<?php

namespace App\Models\Product;

use App\Services\MediaService\MediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'products_photos';

    public $timestamps = false;

    protected $guarded = [];


    public static function getTableName()
    {
        return with(new static)->getTable();
    }

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

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($photo) {
            $productWithCurrentPhoto = Product::where('preview', $photo->filename)->first();
            if ($productWithCurrentPhoto) {
                $productWithCurrentPhoto->preview = null;
                $productWithCurrentPhoto->save();
            }
        });
    }
}
