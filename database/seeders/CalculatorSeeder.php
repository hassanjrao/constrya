<?php

namespace Database\Seeders;

use App\Models\Calculator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'SheetRock',
                'slug' => 'sheetrock',
            ],
            [
                'name' => 'Facius',
                'slug' => 'facius',
            ],
            [
                'name' => 'Flat Ceiling',
                'slug' => 'flat-ceiling',
            ],
            [
                'name' => 'Muros',
                'slug' => 'muros',
            ],
            [
                'name' => 'Plafon',
                'slug' => 'plafon',
            ],
            [
                'name' => 'Quotation',
                'slug' => 'quotation',
            ],
            [
                'name' => 'Memory Calculation',
                'slug' => 'memory-calculation',
            ]
        ];

        DB::table('calculators')->insert($data);
    }
}
