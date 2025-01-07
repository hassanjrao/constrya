<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Free',
            'price' => 0
        ]);

        Plan::create([
            'name' => 'Professional',
            'price' => 10
        ]);
    }
}
