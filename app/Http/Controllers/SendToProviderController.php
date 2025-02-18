<?php

namespace App\Http\Controllers;

use App\Mail\PdfAttachmentMail;
use App\Models\Provider;
use App\Models\UserFaciasCalculation;
use App\Models\UserFlatRoofCalculation;
use App\Models\UserPlafonCalculation;
use App\Models\UserSheetRockCalculation;
use App\Notifications\SendToProviderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mpdf\Mpdf;

class SendToProviderController extends Controller
{

    public function __construct()
    {
        if(!userSubscribed()){
            return response()->json(['message' => __('No tienes una suscripción activa.')], 403);
        }
    }

    public function sendToProvidersSheetRock(Request $request)
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

        $this->sendToProviderS($pdfContent);

        return response()->json(['message' => __('Correos electrónicos enviados a proveedores.')]);
    }


    public function sendToProviderS($pdfContent)
    {
        $providers = Provider::all();

        foreach ($providers as $provider) {
            Mail::to($provider->email)->send(new PdfAttachmentMail($pdfContent));
        }
    }


    public function sendToProvidersFacias(Request $request)
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

        $this->sendToProviderS($pdfContent);


        return response()->json(['message' => __('Correos electrónicos enviados a proveedores.')]);
    }

    public function sendToProvidersFlatRoof(Request $request)
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

        $this->sendToProviderS($pdfContent);


        return response()->json(['message' => __('Correos electrónicos enviados a proveedores.')]);
    }


    public function sendToProvidersPlafon(Request $request)
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

        $this->sendToProviderS($pdfContent);


        return response()->json(['message' => __('Correos electrónicos enviados a proveedores.')]);
    }
}
