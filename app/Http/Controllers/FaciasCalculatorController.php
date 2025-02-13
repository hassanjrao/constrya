<?php

namespace App\Http\Controllers;

use App\Models\UserFaciasCalculation;
use Illuminate\Http\Request;

class FaciasCalculatorController extends Controller
{
    public function calculate(Request $request){


        $largo = (float) $request->largo;
        $ancho = (float) $request->ancho;

        $base = [
            'a' => (float) $request->a,
            'b' => (float) $request->b,
            'c' => (float) $request->c,
            'd' => (float) $request->d,
        ];

        $perimetro_ml = ($largo + $ancho) * 2;
        $m2 = $largo * $ancho;
        $durmientes_ml = $perimetro_ml;
        $durmientes_und = ($perimetro_ml * 3) / 3.05;
        $durmientes_und_cal1 = ($durmientes_und * 0.05) + $durmientes_und;

        $parales_secciones = $perimetro_ml / 0.61;
        $parales = ($base['a'] + $base['d']) * $parales_secciones / 3.05;

        $m2_facias = $perimetro_ml * ($base['a'] + $base['b'] + $base['c'] + $base['d']);
        $planchas_m2_facias = $m2_facias;
        $planchas = $planchas_m2_facias / 2.97;

        $esquineros_ml = $perimetro_ml;
        $esquineros = ($esquineros_ml * 2) / 3.05;
        $esquineros_calc1 = ($esquineros * 0.05) + $esquineros;

        $mano_obra_facia_3caras = $perimetro_ml * 3;
        $mano_obra_facia_5caras = $perimetro_ml * 5;
        $mano_obra_facia_2caras = $perimetro_ml * 2;

        $masilla_galones = $planchas / 4;
        $masilla_cubetas = $masilla_galones / 5;

        $tornillos_plancha = $planchas * 30 / 270;
        $tornillo_estructura = $parales_secciones * 10 / 430;
        $clavos_pin = 3 * $parales_secciones / 100;
        $fulminantes = $clavos_pin;
        $cinta = $planchas * 8.75 / 250;

        $data=[
            'largo' => $largo,
            'ancho' => $ancho,
            'a' => $base['a'],
            'b' => $base['b'],
            'c' => $base['c'],
            'd' => $base['d'],
            'perimetro_ml' => round($perimetro_ml, 2),
            'm2' => round($m2, 2),
            'durmientes_ml' => round($durmientes_ml, 2),
            'durmientes_und' => round($durmientes_und_cal1),
            'parales_secciones' => round($parales_secciones, 2),
            'parales' => round($parales, 2),
            'm2_facias' => round($m2_facias, 2),
            'planchas' => round($planchas, 2),
            'masilla_galones' => round($masilla_galones, 2),
            'masilla_cubetas' => round($masilla_cubetas, 2),
            'tornillos_plancha' => ceil($tornillos_plancha),
            'tornillo_estructura' => round($tornillo_estructura, 2),
            'clavos_pin' => round($clavos_pin, 2),
            'fulminantes' => round($fulminantes, 2),
            'cinta' => round($cinta, 2),
            'mano_obra_3caras' => round($mano_obra_facia_3caras, 2),
            'mano_obra_5caras' => round($mano_obra_facia_5caras, 2),
            'mano_obra_2caras' => round($mano_obra_facia_2caras, 2)
        ];

        if(auth()->check()){
            $data['user_id'] = auth()->id();
            UserFaciasCalculation::create($data);
        }

        return response()->json(
            $data
        );

    }
}
