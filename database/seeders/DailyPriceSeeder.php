<?php

namespace Database\Seeders;

use App\Models\DailyPrice;
use Illuminate\Database\Seeder;

class DailyPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DailyPrice::updateOrCreate([
            'id'=>1
        ],[
            'id'=>1,
            'precio' => '0',
            'precio_materiales' => '0',
            'precio_todo' => '0'
        ]);
    }
}
