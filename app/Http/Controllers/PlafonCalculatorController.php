<?php

namespace App\Http\Controllers;

use App\Models\UserPlafonCalculation;
use Illuminate\Http\Request;

class PlafonCalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        // 1) Retrieve input values (similar to reading cells in Excel)
        $largo = (float) $request->largo;         // B2
        $ancho = (float) $request->ancho;         // B3
        $unidad = $request->unidad;               // B4 ("ft" or "m")
        $panelSize = $request->panel_size;        // B5 ("2x2" or "2x4")

        // 2) Convert to meters if in feet
        if ($unidad === 'ft') {
            $largo *= 0.3048;
            $ancho *= 0.3048;
        }

        // 3) Determine panel area
        if ($panelSize === '2x2') {
            $panelArea = 0.372;  // m^2
        } else {
            // "2x4"
            $panelArea = 0.744;  // m^2
        }

        // 4) Calculate total area
        $totalArea = $largo * $ancho;

        // 5) Panel count (rounded up)
        $panelCount = ceil($totalArea / $panelArea);

        // 6) Main tee calculations
        //    mainTeeLength = CEILING((Ancho / 1.22) * Largo)
        $mainTeeLength = ceil(($ancho / 1.22) * $largo);

        //    mainTeeCount = CEILING(mainTeeLength / 3.66)
        $mainTeeCount = ceil($mainTeeLength / 3.66);

        // 7) Cross tee calculations
        //    crossTee4Count = CEILING((Largo / 0.61) * (Ancho / 1.22)) - 1
        $crossTee4Count = ceil(($largo / 0.61) * ($ancho / 1.22)) - 1;

        //    if panelSize = "2x4", crossTee2Count = 0, else the same formula
        if ($panelSize === '2x4') {
            $crossTee2Count = 0;
        } else {
            $crossTee2Count = ceil(($largo / 0.61) * ($ancho / 1.22)) - 1;
        }

        // 8) Angular length and count
        $angularLength = ($largo + $ancho) * 2;
        $angularCount = ceil($angularLength / 3);

        // 9) Suspension count
        $suspensionCount = $mainTeeCount * ceil($largo / 1.22);

        // 10) Clavos Tipo L and Fulminantes
        $clavosTipoL = $mainTeeCount * 5;
        $fulminantes = $mainTeeCount * 5;


        $data = [
            'largo'           => $largo,
            'ancho'           => $ancho,
            'unidad'          => $unidad,
            'panel_size'       => $panelSize,
            'panel_area'       => $panelArea,
            'total_area'       => $totalArea,
            'panel_count'      => $panelCount,
            'main_tee_count'    => $mainTeeCount,
            'cross_tee4_count'  => $crossTee4Count,
            'cross_tee2_count'  => $crossTee2Count,
            'angular_count'    => $angularCount,
            'suspension_count' => $suspensionCount,
            'clavos_tipo_l'     => $clavosTipoL,
            'fulminantes'     => $fulminantes,
        ];


        $calculationId = null;

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
            $calculation = UserPlafonCalculation::create($data);

            $calculationId = $calculation->id;
        }

        $data['calculationId'] = $calculationId;


        // 11) Return the results (e.g., as JSON)
        return response()->json($data);
    }
}
