<?php

namespace Database\Factories;

use App\Models\UserPlayer;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPlayer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'player_id' => $this->faker->word,
        'frequency' => $this->faker->word,
        'course_id' => $this->faker->randomDigitNotNull,
        'tee_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
