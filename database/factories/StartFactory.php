<?php

namespace Database\Factories;

use App\Models\Start;
use Illuminate\Database\Eloquent\Factories\Factory;

class StartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Start::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'field_id' => $this->faker->randomDigitNotNull,
        'gender' => $this->faker->word,
        'default' => $this->faker->word,
        'startcolor_id' => $this->faker->randomDigitNotNull,
        'slope' => $this->faker->word,
        'rating' => $this->faker->word,
        'par' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
