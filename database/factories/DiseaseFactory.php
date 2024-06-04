<?php

namespace Database\Factories;
use App\Models\Disease;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiseaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Disease::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'type'=> $this->faker->randomElement(['Dijabetes','Dermatitis','Grip','Bronhitis','Atrofija','Astma','Gastritis','Infarkt','Osteoporoza','Tuberkuloza','Herpes','Šizofrenija']),
            'symptoms'=> $this->faker->randomElement(['temperatura','glavobolja','mučnine','umor','bol u stomaku','ubrzano lupanje srca']),
            'medicine'=> $this->faker->numberBetween(1,10),

        ];
    }
}
