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
    public function automaticQuoteSheetRock(Request $request)
    {
        $request->validate([
            'calculation_id' => 'required|numeric|exists:user_sheet_rock_calculations,id',
        ]);

        $calculation = UserSheetRockCalculation::find($request->calculation_id);


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




    public function automaticQuotesFacias(Request $request)
    {

        $request->validate([
            'calculation_id' => 'required|numeric|exists:user_facias_calculations,id',
        ]);

        $faciaCalculation = UserFaciasCalculation::find($request->calculation_id);


        // Instantiate mPDF
        $mpdf = new Mpdf();
        // Render the Blade view to HTML
        $html = view('front.pdfs.facias', compact('faciaCalculation'))->render();
        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        $pdfContent =  $mpdf->Output('', 'S');



        return response()->json(['message' => 'Emails sent to providers']);
    }

    public function automaticQuotesFlatRoof(Request $request)
    {

        $request->validate([
            'calculation_id' => 'required|numeric|exists:user_flat_roof_calculations,id',
        ]);

        $roofCalculation = UserFlatRoofCalculation::find($request->calculation_id);


        // Instantiate mPDF
        $mpdf = new Mpdf();
        // Render the Blade view to HTML
        $html = view('front.pdfs.flat-roof', compact('roofCalculation'))->render();
        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        $pdfContent =  $mpdf->Output('', 'S');



        return response()->json(['message' => 'Emails sent to providers']);
    }


    public function automaticQuotesPlafon(Request $request)
    {

        $request->validate([
            'calculation_id' => 'required|numeric|exists:user_plafon_calculations,id',
        ]);

        $plafonCalculation = UserPlafonCalculation::find($request->calculation_id);


        // Instantiate mPDF
        $mpdf = new Mpdf();
        // Render the Blade view to HTML
        $html = view('front.pdfs.plafon', compact('plafonCalculation'))->render();
        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        $pdfContent =  $mpdf->Output('', 'S');



        return response()->json(['message' => 'Emails sent to providers']);
    }
}
