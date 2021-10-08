<?php

namespace Database\Factories;

use App\Models\BetRayaPunto;
use Illuminate\Database\Eloquent\Factories\Factory;

class BetRayaPuntoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BetRayaPunto::class;

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
        'birdie' => $this->faker->word,
        'aguila' => $this->faker->word,
        'albatros' => $this->faker->word,
        'hoyo_uno' => $this->faker->word,
        'exceso' => $this->faker->word,
        'mas_golpes' => $this->faker->text,
        'label1' => $this->faker->text,
        'value1' => $this->faker->word,
        'label2' => $this->faker->text,
        'value2' => $this->faker->word,
        'label3' => $this->faker->text,
        'value3' => $this->faker->word,
        'label4' => $this->faker->text,
        'value4' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
