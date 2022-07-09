<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(900, 150000);
        $isOldPrice = $this->faker->boolean;
        $oldPrice = $isOldPrice ? $this->faker->numberBetween($price, $price + ($this->faker->numberBetween(100, 5000))) : null;
        $availability = $this->faker->randomElement([Product::AVAILABILITY_IN_STOCK, Product::AVAILABILITY_OUT_OF_STOCK]);

        return [
            'name' => $this->faker->catchPhrase(),
            'price' => $this->faker->numberBetween(900, 99999),
            'old_price' => $oldPrice,
            'availability' => $availability,
            'quantity' => $availability === Product::AVAILABILITY_OUT_OF_STOCK ? 0 : $this->faker->numberBetween(1, 150),
            'vendor_code' => $this->faker->ean8(),
            'category_id' => $this->faker->numberBetween(1, 20),
            'manufacturer_id' => $this->faker->numberBetween(1, 5),
            'preview' => $this->faker->imageUrl(570, 633, 'belts', true)
        ];
    }
}
