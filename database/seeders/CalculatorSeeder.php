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
                'name' => 'Facius',
                'slug' => 'facius',
                'view' => 'front.facius.index'
            ],
            [
                'name' => 'Flat Ceiling',
                'slug' => 'flat-ceiling',
                'view' => 'front.flat-ceiling.index'
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
