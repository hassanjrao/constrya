<?php

namespace App\Http\Controllers;

use App\Models\UserFlatRoofCalculation;
use Illuminate\Http\Request;

class FlatRoofCalculatorController extends Controller
{
    public function calculate(Request $request){

        $largo = (float) $request->largo;
        $ancho = (float) $request->ancho;
        $mano_precio = (float) $request->mano_precio;
        $perfiles=$request->perfiles;
        $acabado=$request->acabado;
        $tipo_plancha=$request->tipo_plancha;
        $tipo_cinta=$request->tipo_cinta;

        $perimetro_ml = ($largo + $ancho) * 2;
        $m2 = $largo * $ancho;
        $durmientes_ml = $perimetro_ml;
        $durmientes_und = $perimetro_ml / 3.05;
        $durmientes_und_cal1 = ($durmientes_und * 0.05) + $durmientes_und;

        $parales_ancho = $ancho;
        $parales_largo = $largo;
        $parales_und_largo = $parales_largo / 1.21 * $parales_ancho / 3.05;
        $parales_und_ancho = $parales_ancho / 0.61 * $parales_largo / 3.05;
        $parales = $parales_und_largo + $parales_und_ancho;

        $esquineros_ml = $perimetro_ml;
        $esquineros = ($esquineros_ml * 2) / 3.05;
        $esquineros_calc1 = ($esquineros * 0.05) + $esquineros;
        $esquineros_mas = ceil($esquineros_calc1);

        $planchas_m2 = $m2;
        $planchas = $planchas_m2 / 2.97;
        $planchas_redondeo = round($planchas);

        $mano_obra = $mano_precio * $m2;

        $masilla_galones = $planchas / 4;
        $masilla_cubetas = ceil($planchas_redondeo / 10);

        $tornillos_plancha = $planchas * 36 / 265;
        $tornillo_estructura = $parales * 28 / 430;
        $clavos_pin = $largo / 0.61 * $ancho / 1.21 + $durmientes_und * 5;
        $fulminantes = $clavos_pin;
        $cinta = $planchas * 8.75 / 250;

        $data=[
            'largo' => $largo,
            'ancho' => $ancho,
            'mano_precio' => $mano_precio,
            'perfiles' => $perfiles,
            'acabado' => $acabado,
            'tipo_plancha' => $tipo_plancha,
            'tipo_cinta' => $tipo_cinta,
            'perimetro_ml' => round($perimetro_ml, 2),
            'm2' => round($m2, 2),
            'durmientes_ml' => round($durmientes_ml, 2),
            'durmientes_und' => round($durmientes_und_cal1),
            'parales_ancho' => round($parales_ancho, 2),
            'parales_largo' => round($parales_largo, 2),
            'parales_und_largo' => round($parales_und_largo, 2),
            'parales' => ceil($parales),
            'esquineros_ml' => round($esquineros_ml, 2),
            'esquineros' => round($esquineros, 2),
            'esquineros_mas' => round($esquineros_mas, 2),
            'planchas_m2' => round($planchas_m2, 2),
            'planchas' => round($planchas_redondeo, 2),
            'mano_obra' => round($mano_obra, 2),
            'masilla_galones' => round($masilla_galones, 2),
            'masilla_cubetas' => round($masilla_cubetas, 2),
            'tornillos_plancha' => round($tornillos_plancha, 2),
            'tornillo_estructura' => round($tornillo_estructura, 2),
            'clavos_pin' => round($clavos_pin, 2),
            'fulminantes' => round($fulminantes, 2),
            'cinta' => ceil($cinta),
        ];


        $calculationId = null;
        if(auth()->check()){
            $data['user_id'] = auth()->id();
           $calculation= UserFlatRoofCalculation::create($data);


           $calculationId = $calculation->id;
        }

        $data['calculationId'] = $calculationId;



        return response()->json($data);
    }
}
