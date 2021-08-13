<?php

namespace Database\Factories;

use App\Models\CourseTeeDefault;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTeeDefaultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseTeeDefault::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomDigitNotNull,
        'gender' => $this->faker->word,
        'tee_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
