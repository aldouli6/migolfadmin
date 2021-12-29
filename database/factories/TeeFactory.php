<?php

namespace Database\Factories;

use App\Models\Tee;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'enabled' => $this->faker->word,
        'default' => $this->faker->word,
        'course_id' => $this->faker->randomDigitNotNull,
        'gender' => $this->faker->word,
        'teecolor_id' => $this->faker->randomDigitNotNull,
        'slope' => $this->faker->word,
        'rating' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
