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
    public static function new(string $name, string $frontendType, ?int $sort = 0): Attribute
    {
        return self::create([
            'name' => $name,
            'frontend_type' => $frontendType,
            'sort' => $sort
        ]);
    }
}
