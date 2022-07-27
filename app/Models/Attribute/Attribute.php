<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'attributes';

    public $timestamps = false;

    protected $guarded = [];

    public const TYPE_TEXT = 'text';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_RADIO = 'radio';


    /**
     * @param string $name Название характеристики
     * @param string $frontendType Тип характеристики
     * @param int|null $sort Сортировка
     * @return Attribute
     */
    public static function new(string $name, string $frontendType, ?string $fullname = null, ?int $sort = 0): Attribute
    {
        return self::create([
            'name' => $name,
            'frontend_type' => $frontendType,
            'fullname' => $fullname,
            'sort' => $sort
        ]);
    }

    public function links()
    {
        return $this->hasMany(Link::class, 'attribute_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'attribute_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(CategoryLink::class, 'attribute_id', 'id');
    }


    public static function boot()
    {
        parent::boot();

        static::deleted(function ($attribute) {
            $attribute->categories()->delete();
            $attribute->values()->delete();
            $attribute->links()->delete();
        });
    }
}
