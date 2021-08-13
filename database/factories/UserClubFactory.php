<?php

namespace Database\Factories;

use App\Models\UserClub;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserClubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserClub::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->word,
        'club_id' => $this->faker->randomDigitNotNull,
        'classification' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
