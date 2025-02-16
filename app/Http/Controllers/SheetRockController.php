<?php

namespace App\Http\Controllers;

use App\Models\UserSheetRockCalculation;
use Illuminate\Http\Request;

class SheetRockController extends Controller
{


    public function calculate(Request $request)
    {
        $request->validate([
            'metros_lineares' => 'required|numeric',
            'height' => 'required|numeric',
            'sides' => 'required|numeric',
            'profile' => 'required',
            'finish' => 'required',
            'tape' => 'required',
            'doors' => 'required|numeric',
            'corners' => 'required|numeric',
            'corner_pieces' => 'required',
            'interior_exterior' => 'required',
        ]);

        $metros_lineares = $request->metros_lineares;
        $height = $request->height;
        $sides = $request->sides;
        $profile = $request->profile;
        $finish = $request->finish;
        $tape = $request->tape;
        $doors = $request->doors;
        $corners = $request->corners;
        $corner_pieces = $request->corner_pieces;
        $interior_exterior = $request->interior_exterior;
        $board_type = $request->board_type;

        $product = $metros_lineares * $height;
        $m2box = $product;

        // TextBox1=metros_lineares
        // TextBox2=altura
        // TextBox3=m2
        // TextBox4=doores/puertas
        // TextBox5=Corners/esquinas
        // ComboBox2=Finish/acabado
        // product=metros_lineares * altura
        // m2etiqueta=product
        // M2BOX=product


        // Sleepers/durmientes=ceil(metros_lineares / 3.05 * 2)
        // Parales/studs=ceil(metros_lineares / 0.6 * altura / 3.05)
        // Structural screws/tornillos_estructura=ceil(studs * 4 / 342)
        // Nails/clavos=ceil(metros_lineares / 3.05 * 2 * 5)
        // Paper tape/cinta_papel if side=1=ceil(product / 2.9768 * 2.44 / 76.2) else ceil(product / 2.9768 * 2.44 / 76.2 * 2)
        // Screws/tornillos= if side=1=ceil(product / 2.9768 * 36 / 260) else ceil(product / 2.9768 * 36 / 260 * 2)
        // Masilla Cubo /Putty - Bucket= if side=1=ceil(product / 2.9768 / 10) else ceil(product / 2.9768 * 2 / 10)
        // corner_beads/esquineros= if not empty then corners =corners*altura/3.0 else 0
        // Wood reinforcement/refuerzo_madera=ceil(doors * 2)
        // Panels/planchas= if side=1=ceil(product / 2.9768) else ceil(product / 2.9768 * 2)
        // fasteners/fulminantes=ceil(metros_lineares / 3.05 * 2 * 5)
        // Cementin= if finish=Empañete=ceil(panels / 4) else 0

        $sleepers=ceil($metros_lineares / 3.05 * 2);
        $studs=ceil($metros_lineares / 0.6 * $height / 3.05);
        $structural_screws=ceil($studs * 4 / 342);
        $nails=ceil($metros_lineares / 3.05 * 2 * 5);
        $tapes=($sides==1)?ceil($product / 2.9768 * 2.44 / 76.2):ceil($product / 2.9768 * 2.44 / 76.2 * 2);
        $screws=($sides==1)?ceil($product / 2.9768 * 36 / 260):ceil($product / 2.9768 * 36 / 260 * 2);
        $putty=($sides==1)?ceil($product / 2.9768 / 10):ceil($product / 2.9768 * 2 / 10);
        $corner_beads=($corner_pieces)?ceil($corners * $height / 3.0):0;
        $wood_reinforcement=ceil($doors * 2);
        $panels=($sides==1)?ceil($product / 2.9768):ceil($product / 2.9768 * 2);
        $fasteners=ceil($metros_lineares / 3.05 * 2 * 5);
        $cement=($finish=='Empañete')?ceil($panels / 4):0;


        $data=[
            'metros_lineares' => $metros_lineares,
            'height' => $height,
            'sides' => $sides,
            'profile' => $profile,
            'finish' => $finish,
            'board_type'=>$board_type,
            'tape' => $tape,
            'doors' => $doors,
            'corners' => $corners,
            'corner_pieces' => $corner_pieces,
            'interior_exterior' => $interior_exterior,
            'product' => $product,
            'm2box' => $m2box,
            'sleepers' => $sleepers,
            'studs' => $studs,
            'structural_screws' => $structural_screws,
            'nails' => $nails,
            'tapes' => $tapes,
            'screws' => $screws,
            'putty' => $putty,
            'corner_beads' => $corner_beads,
            'wood_reinforcement' => $wood_reinforcement,
            'panels' => $panels,
            'fasteners' => $fasteners,
            'cement' => $cement,

        ];

        $calculationId = null;

        if(auth()->check()){
          $calculation=  UserSheetRockCalculation::create([
                'user_id' => auth()->id(),
                'metros_lineares' => $metros_lineares,
                'height' => $height,
                'sides' => $sides,
                'profile' => $profile,
                'finish' => $finish,
                'board_type'=>$board_type,
                'tape' => $tape,
                'doors' => $doors,
                'corners' => $corners,
                'corner_pieces' => $corner_pieces,
                'interior_exterior' => $interior_exterior,
                'product' => $product,
                'm2box' => $m2box,
                'sleepers' => $sleepers,
                'studs' => $studs,
                'structural_screws' => $structural_screws,
                'nails' => $nails,
                'tapes' => $tapes,
                'screws' => $screws,
                'putty' => $putty,
                'corner_beads' => $corner_beads,
                'wood_reinforcement' => $wood_reinforcement,
                'panels' => $panels,
                'fasteners' => $fasteners,
                'cement' => $cement,
            ]);

            $calculationId = $calculation->id;
        }

        $data['calculationId'] = $calculationId;


        return response()->json($data);
    }
}
