<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'title' => 'Provider 1',
            'email' => 'p1@m.com',
        ]);
        Provider::create([
            'title' => 'Provider 2',
            'email' => 'p2@m.com',
        ]);
        Provider::create([
            'title' => 'Provider 3',
            'email' => 'p3@m.com',
        ]);
    }
}
