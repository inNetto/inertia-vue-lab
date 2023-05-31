<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),
            'quantity_required' => $this->faker->randomDigit,
            'unitary_value' => $this->faker->randomFloat(2, 0, 8),
            'total_value' => $this->faker->randomFloat(2, 0, 8),
        ];
    }
}
