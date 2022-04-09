<?php

namespace Database\Factories;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use function MongoDB\BSON\toJSON;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jsonData = [];
        for ($i = 0; $i < 10; $i++) {
            $jsonData[] = [$this->faker->words(2, true) => $this->faker->sentence()];
        }

        return [
            'name' => $this->faker->words(2, true),
            'article' => $this->faker->unique()->lexify("????-????-????"),
            'status' => $this->faker->boolean() ? "available" : "unavailable",
            'data' => json_encode($jsonData),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
