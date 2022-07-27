<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'attribute_values';

    public $timestamps = false;

    protected $guarded = [];


    public static function new(int $attributeId, string $value, ?int $sort = 0)
    {
        return self::create([
            'attribute_id' => $attributeId,
            'value' => $value,
            'sort' => $sort
        ]);
    }
}
