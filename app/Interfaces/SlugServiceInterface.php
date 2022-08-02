<?php

namespace App\Interfaces;

interface SlugServiceInterface
{
    /**
     * Генерация слага
     * @param string $string
     * @param string $delimiter
     * @param $model
     * @param string $attributeName
     * @param int|null $parentId
     * @return mixed
     */
    public function createSlug(string $string, string $delimiter, $model, string $attributeName, ?int $parentId = null, $iterator = null);
}
