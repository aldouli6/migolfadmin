<?php

namespace Database\Factories;

use App\Models\BetRompeHandicap;
use Illuminate\Database\Eloquent\Factories\Factory;

class BetRompeHandicapFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetRompeHandicap::class;

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
        'bet1_9' => $this->faker->word,
        'bet10_18' => $this->faker->word,
        'bet_total' => $this->faker->word,
        'opcion' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
