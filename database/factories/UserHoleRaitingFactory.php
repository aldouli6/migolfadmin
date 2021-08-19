<?php

namespace Database\Factories;

use App\Models\UserHoleRaiting;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserHoleRaitingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserHoleRaiting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player_id' => $this->faker->word,
        'hole_raiting_type' => $this->faker->word,
        'hole_raitinig' => $this->faker->word,
        'date_hole_raiting' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
