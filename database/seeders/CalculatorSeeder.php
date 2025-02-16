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
                'view' => 'front.landing2'
            ],
            [
                'name' => 'Facias',
                'slug' => 'facias',
                'view' => 'front.facias.index'
            ],
            [
                'name' => 'Flat Roof',
                'slug' => 'flat-roof',
                'view' => 'front.flat-roof.index'
            ],
            [
                'name' => 'Plafon',
                'slug' => 'plafon',
                'view' => 'front.plafon.index'
            ],
            [
                'name' => 'Quotation',
                'slug' => 'quotation',
                'view' => 'front.quotes.index'
            ]
        ];

        DB::table('calculators')->insert($data);
    }
}
