<?php

namespace Database\Factories;
use App\Models\Examination;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExaminationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Examination::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'doctor1' => $this->faker->numberBetween(1,10),
            'patient1' => $this->faker->numberBetween(1,10),
            'disease1' => $this->faker->numberBetween(1,10),
            'medicine1' => $this->faker->numberBetween(1,10),
            
        ];
    }
}
