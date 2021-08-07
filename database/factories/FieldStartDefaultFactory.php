<?php

namespace Database\Factories;

use App\Models\FieldStartDefault;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldStartDefaultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FieldStartDefault::class;

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
        'start_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
