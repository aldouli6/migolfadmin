<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'enabled' => $this->faker->word,
        'alias' => $this->faker->word,
        'name' => $this->faker->word,
        'lastname' => $this->faker->word,
        'gender' => $this->faker->word,
        'country_id' => $this->faker->randomDigitNotNull,
        'state_id' => $this->faker->randomDigitNotNull,
        'phone_code' => $this->faker->word,
        'phone' => $this->faker->word,
        'email' => $this->faker->word,
        'password' => $this->faker->word,
        'role' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
