<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt2222@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);

        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt1@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt2@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt3@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt4@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt43@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt6@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt56@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt9@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);


        Supplier::create([
            'name' => 'PT. ABC',
            'email'=>'pt10@n.com',
            'phone'=>'08123456789',
            'address'=>'Jl. ABC No. 123',
            'logo'=>'https://via.placeholder.com/150',
        ]);

    }
}
