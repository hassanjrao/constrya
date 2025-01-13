<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            ['name_sp' => 'PLANCHA YESO USG ULTRALIGHT 1/2', 'name_en' => 'USG UltraLight Gypsum Board 1/2'],
            ['name_sp' => 'Cementin Keraflor Mapei', 'name_en' => 'Keraflor Cement by Mapei'],
            ['name_sp' => 'Durmientes - 1 5/8 x 10 C25', 'name_en' => 'Sleepers - 1 5/8 x 10 C25'],
            ['name_sp' => 'Parales - 1 5/8 x 10 C25', 'name_en' => 'Studs - 1 5/8 x 10 C25'],
            ['name_sp' => 'Durmientes - 2 1/2 x 10 C25', 'name_en' => 'Sleepers - 2 1/2 x 10 C25'],
            ['name_sp' => 'Parales - 2 1/2 x 10 C25', 'name_en' => 'Studs - 2 1/2 x 10 C25'],
            ['name_sp' => 'PLANCHA YESO KNAUF 1/2" X 4 X 8', 'name_en' => 'Knauf Gypsum Board 1/2" x 4 x 8'],
            ['name_sp' => 'PLANCHA YESO PANEL REY LIGHT 1/2" X 4 X 8', 'name_en' => 'Panel Rey Light Gypsum Board 1/2" x 4 x 8'],
            ['name_sp' => 'PLANCHA YESO ANTIHONGO MORADA 1/2" X 4 X 8', 'name_en' => 'Anti-fungal Purple Gypsum Board 1/2" x 4 x 8'],
            ['name_sp' => 'PLANCHA YESO ANTIHONGO KNAUF 1/2" X 4 X 8', 'name_en' => 'Anti-fungal Knauf Gypsum Board 1/2" x 4 x 8'],
            ['name_sp' => 'PLANCHA SECURROCK 1/2" X 4 X 8', 'name_en' => 'Securock Board 1/2" x 4 x 8'],
            ['name_sp' => 'ESQUINERO METALICO 1 1/4 X 10', 'name_en' => 'Metal Corner 1 1/4 x 10'],
            ['name_sp' => 'ESQUINERO PLASTICO 1 1/4 X 10', 'name_en' => 'Plastic Corner 1 1/4 x 10'],
            ['name_sp' => 'CINTA MALLA 2 X 250', 'name_en' => 'Mesh Tape 2 x 250'],
            ['name_sp' => 'CINTA PAPEL JUNTAS 2 X 250 PROFORM', 'name_en' => 'ProForm Joint Paper Tape 2 x 250'],
            ['name_sp' => 'MASILLA KNAUF / 5 GAL', 'name_en' => 'Knauf Putty / 5 GAL'],
            ['name_sp' => 'MASILLA TAPA VERDE USG ALL PURPOSE / 5 GAL', 'name_en' => 'USG All-Purpose Green Lid Putty / 5 GAL'],
            ['name_sp' => 'MASILLA SUPER MASTIK', 'name_en' => 'Super Mastik Putty'],
            ['name_sp' => 'MASILLA EASY FINISH / TAPA MORADA 5 GAL', 'name_en' => 'Easy Finish Purple Lid Putty / 5 GAL'],
            ['name_sp' => 'TORNILLO PLANCHA PUNTA FINA 1 1/4 / LIBRA', 'name_en' => 'Fine Tip Board Screw 1 1/4 / Pound'],
            ['name_sp' => 'TORNILLO ESTRUCTURA PUNTA FINA 7/16 / LIBRA', 'name_en' => 'Fine Tip Structural Screw 7/16 / Pound'],
            ['name_sp' => 'FULMINANTE CALIBRE 22 / 1 UND', 'name_en' => 'Caliber 22 Cartridge / 1 Unit'],
            ['name_sp' => 'FULMINANTE CALIBRE 22 / POR CAJA', 'name_en' => 'Caliber 22 Cartridge / Per Box'],
            ['name_sp' => 'CLAVO 1 1/4 CON ARANDELA / 1 UND', 'name_en' => 'Nail 1 1/4 with Washer / 1 Unit'],
            ['name_sp' => 'CLAVO 1 1/4 CON ARANDELA / POR CAJA', 'name_en' => 'Nail 1 1/4 with Washer / Per Box'],
            ['name_sp' => 'PLAFON PVC MACHIHEMBRADO BLANCO 25cm x 19 x 7.5mm', 'name_en' => 'White PVC Tongue and Groove Ceiling 25cm x 19 x 7.5mm'],
            ['name_sp' => 'MOLDURA TIPO F 5.8M', 'name_en' => 'F-Type Molding 5.8M']
        ];

        DB::table('materials')->insert($materials);

    }
}
