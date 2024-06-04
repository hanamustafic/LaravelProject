<?php

namespace Database\Factories;
use App\Models\Doctor;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'named'=> $this->faker->name(),
            'lastnamed'=> $this->faker->lastname(),
            'birth'=> $this->faker->dateTimeBetween($startDate='-50 years', $endDate='-30 years',$timezone=null),
            'specialization'=> $this->faker->randomElement(['Onkolog','Kardiolog','Stomatolog','Dermatolog','Oftalmolog','Otolaringolog','Pedijatar','Psihijatar']),
            'examination' => $this->faker->numberBetween(1,10),
        ];

    }
}