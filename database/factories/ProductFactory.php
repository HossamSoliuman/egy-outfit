<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $gender = [Product::GENDER_MALE, product::GENDER_FEMALE, product::GENDER_ALL];
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'category_id' => rand(1, 5),
            'gender' => fake()->randomElement($gender),
            'sku' => strtoupper(Str::random(10)),
            'stock' => $this->faker->numberBetween(0, 100),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'color' => $this->faker->safeColorName,
            'material' => $this->faker->randomElement(['cotton', 'polyester', 'wool']),
            'cover' => $this->faker->imageUrl(640, 480, 'fashion'),
            'brand_id' => rand(1, 10),
            'discount' => $this->faker->optional()->randomFloat(2, 0, 100),
            'is_featured' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
        ];
    }
}
