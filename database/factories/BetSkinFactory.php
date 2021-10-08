<?php

namespace Database\Factories;

use App\Models\BetSkin;
use Illuminate\Database\Eloquent\Factories\Factory;

class BetSkinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetSkin::class;

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
        'ventaja' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
