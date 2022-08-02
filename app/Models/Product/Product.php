<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Services\MediaService\MediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cookie;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property string $name Наименование товарной позиции
 * @property string slug ЧПУ товарной позиции
 * @property int price Стоимость товарной позиции
 * @property ?int $old_price Предыдущая стоимость товарной позиции
 * @property string $availability Наличие товара
 * @property int $quantity Количество товара
 * @property string $vendor_code Артикул товара
 * @property ?int $category_id ИД категории
 * @property ?int $manufacturer_id ИД производителя
 * @property ?string $preview Превью
 * @property bool $status Статус доступности товара
 */
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


    public function isAvailableInStock()
    {
        return $this->availability === self::AVAILABILITY_IN_STOCK;
    }

    public function isAvailable(int $productQuantity = 1)
    {
        return $this->isAvailableInStock() && $this->quantity >= $productQuantity && $this->status == self::STATUS_ACTIVE;
    }

    public function inCart()
    {
        $cartItems = collect(json_decode(Cookie::get('cart')));

        return !is_null($cartItems->where('product_id', $this->id)->first()) ? true : false;
    }


    // Relations

    /**
     * Категория товара
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }


    // Methods
    public function addPhoto(string $filename, ?int $sort = 0)
    {
        return Photo::new($this->id, $filename, $sort);
    }


    public static function boot()
    {
        parent::boot();

        static::deleted(function ($product) {
            $product->photos()->delete();
            MediaService::deleteDir('uploads/products/' . $product->id);
        });
    }
}
