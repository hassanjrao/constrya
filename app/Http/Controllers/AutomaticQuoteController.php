<?php

namespace App\Http\Controllers;


use App\Models\UserFaciasCalculation;
use App\Models\UserFlatRoofCalculation;
use App\Models\UserPlafonCalculation;
use App\Models\UserSheetRockCalculation;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class AutomaticQuoteController extends Controller
{

    public function __construct()
    {
        if(!userSubscribed()){
            return abort(403, __("No tienes una suscripción activa."));
        }
    }
    public function automaticQuoteSheetRock(Request $request)
    {
        $request->validate([
            'calculation_id' => 'nullable',
        ]);

        $calculation = UserSheetRockCalculation::where('id', $request->calculation_id)->where('user_id', auth()->id())->first();

        if (!$calculation) {
            return abort(404, __("No calculation found"));
        }


        // Instantiate mPDF
        $mpdf = new Mpdf();
        // Render the Blade view to HTML
        $html = view('front.pdfs.sheet-rock', compact('calculation'))->render();
        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        $pdfContent =  $mpdf->Output('', 'S');

        // open in browser in new tab

        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf');
    }




    public function automaticQuoteFacias(Request $request)
    {

        $request->validate([
            'calculation_id' => 'nullable',
        ]);


        $faciaCalculation = UserFaciasCalculation::where('id', $request->calculation_id)->where('user_id', auth()->id())->first();

        if (!$faciaCalculation) {
            return abort(404, __("No calculation found"));
        }


        // Instantiate mPDF
        $mpdf = new Mpdf();
        // Render the Blade view to HTML
        $html = view('front.pdfs.facias', compact('faciaCalculation'))->render();
        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        $pdfContent =  $mpdf->Output('', 'S');


        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf');
    }

    public function automaticQuoteFlatRoof(Request $request)
    {

        $request->validate([
            'calculation_id' => 'nullable',
        ]);


        $roofCalculation = UserFlatRoofCalculation::where('id', $request->calculation_id)->where('user_id', auth()->id())->first();

        if (!$roofCalculation) {
            return abort(404, __("No calculation found"));
        }



        // Instantiate mPDF
        $mpdf = new Mpdf();
        // Render the Blade view to HTML
        $html = view('front.pdfs.flat-roof', compact('roofCalculation'))->render();
        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        $pdfContent =  $mpdf->Output('', 'S');


        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf');
    }


    public function automaticQuotePlafon(Request $request)
    {

        $request->validate([
            'calculation_id' => 'nullable',
        ]);

        $plafonCalculation = UserPlafonCalculation::where('id', $request->calculation_id)->where('user_id', auth()->id())->first();

        if (!$plafonCalculation) {
            return abort(404, __("No calculation found"));
        }

        // Instantiate mPDF
        $mpdf = new Mpdf();
        // Render the Blade view to HTML
        $html = view('front.pdfs.plafon', compact('plafonCalculation'))->render();
        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        $pdfContent =  $mpdf->Output('', 'S');



        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf');
    }
}
