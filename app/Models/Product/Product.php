<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'products';

    protected $guarded = [];

    public const STATUS_ACTIVE = true;
    public const STATUS_HIDDEN = false;

    public const AVAILABILITY_IN_STOCK = 'in-stock';
    public const AVAILABILITY_OUT_OF_STOCK = 'out-of-stock';


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    /**
     * @param string $name Наименование товара
     * @param int $price Стоимость товара
     * @param int|null $oldPrice Предыдущая стоимость товара
     * @param string $availability Доступность товара к приобретению
     * @param int $quantity Количество товара
     * @param string|null $vendorCode Артикул товара
     * @param int|null $categoryId Категория товара
     * @param int|null $manufacturerId Производитель товара
     * @param string|null $preview Фотография-превью
     * @param bool $status Статус товара (отображать ли в каталоге и т.д.)
     * @return Product
     */
    public static function new(
        string $name,
        int $price,
        ?int $oldPrice,
        string $availability,
        int $quantity,
        ?string $vendorCode,
        ?int $categoryId,
        ?int $manufacturerId,
        ?string $preview = null,
        bool $status = true
    ): Product
    {
        return self::create([
            'name' => $name,
            'price' => $price,
            'old_price' => $oldPrice,
            'availability' => $availability,
            'quantity' => $quantity,
            'vendor_code' => $vendorCode,
            'category_id' => $categoryId,
            'manufacturer_id' => $manufacturerId,
            'preview' => $preview,
            'status' => $status
        ]);
    }
}
