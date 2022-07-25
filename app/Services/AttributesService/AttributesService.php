<?php

namespace App\Services\AttributesService;

use App\Models\Attribute\Attribute;

class AttributesService
{
    public static function getAttributesTypes()
    {
        return collect([
            Attribute::TYPE_CHECKBOX => (object) [
                'name' => 'Чекбокс',
                'value' => Attribute::TYPE_CHECKBOX
            ],
            Attribute::TYPE_RADIO => (object) [
                'name' => 'Радио',
                'value' => Attribute::TYPE_RADIO
            ]
        ]);
    }
}
