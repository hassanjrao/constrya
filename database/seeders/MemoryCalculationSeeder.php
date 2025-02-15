<?php

namespace Database\Seeders;

use App\Models\MemoryCalculation;
use Illuminate\Database\Seeder;

class MemoryCalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemoryCalculation::create([
            'calculator_id' => 1,
            'table_name' => 'user_sheet_rock_calculations'
        ]);


        MemoryCalculation::create([
            'calculator_id' => 2,
            'table_name' => 'user_facias_calculations'
        ]);
        MemoryCalculation::create([
            'calculator_id' => 3,
            'table_name' => 'user_flat_roof_calculations'
        ]);
        MemoryCalculation::create([
            'calculator_id' => 4,
            'table_name' => 'user_plafon_calculations'
        ]);
        MemoryCalculation::create([
            'calculator_id' => 5,
            'table_name' => 'user_sheet_rock_calculations'
        ]);
    }
}
