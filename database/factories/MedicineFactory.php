<?php

namespace Database\Factories;
use App\Models\Medicine;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Medicine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'medicineName'=> $this->faker->randomElement(['Lekadol','Prospan','Orthamol','Panadol','Rosix','Analgin','Paracetamol']),
            'medicineType'=> $this->faker->randomElement(['krema','tableta','kapi','sprej','sirup','kapsula']),
            'usage'=> $this->faker->randomElement(['temperatura','glavobolja','mučnine','umor','bol u stomaku','ubrzano lupanje srca']),

        ];
    }
}