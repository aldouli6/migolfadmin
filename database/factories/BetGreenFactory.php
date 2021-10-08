<?php

namespace Database\Factories;

use App\Models\BetGreen;
use Illuminate\Database\Eloquent\Factories\Factory;

class BetGreenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetGreen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bet_id' => $this->faker->randomDigitNotNull,
        'enabled' => $this->faker->word,
        'bet' => $this->faker->word,
        'condicion1' => $this->faker->text,
        'condicion2' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
