<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Examination;

class ExaminationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Examination::factory()->count(50)->create();
    }
}
