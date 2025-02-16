<?php

namespace App\Http\Controllers;

use App\Mail\PdfAttachmentMail;
use App\Models\Provider;
use App\Models\UserSheetRockCalculation;
use App\Notifications\SendToProviderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mpdf\Mpdf;

class SendToProviderController extends Controller
{
    public function sendToProviders(Request $request)
    {
        $request->validate([
            'calculation_id' => 'required|numeric|exists:user_sheet_rock_calculations,id',
        ]);

        $calculation = UserSheetRockCalculation::find($request->calculation_id);


        $pdfContent=$this->pdf($calculation);


        $providers = Provider::all();

        foreach ($providers as $provider) {

            Mail::to($provider->email)->send(new PdfAttachmentMail($pdfContent));

        }
        return response()->json(['message' => 'Emails sent to providers']);
    }


    public function pdf($calculation)
    {

        // Instantiate mPDF
        $mpdf = new Mpdf();

        // Build your HTML
        $html = '
    <h2 style="text-align:center;">SheetRock Calculation</h2>

    <table width="100%" border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-family:Arial, sans-serif;">
        <tr>
            <td><strong>Linear meters</strong></td>
            <td>'.$calculation->metros_lineares.'</td>
            <td><strong>Height</strong></td>
            <td>'.$calculation->height.'</td>
            <td><strong>1 Side / 2 Sides</strong></td>
            <td>'.$calculation->sides.'</td>
            <td><strong>M<sup>2</sup></strong></td>
            <td>'.$calculation->m2box.'</td>
        </tr>
        <tr>
            <td><strong>Metal profiles @ 60cm</strong></td>
            <td>'.$calculation->profile.'</td>
            <td><strong>Finish</strong></td>
            <td>'.$calculation->finish.'</td>
            <td><strong>Type of board</strong></td>
            <td>'.$calculation->board_type.'</td>
            <td><strong>Tape</strong></td>
            <td>'.$calculation->tape.'</td>
        </tr>
        <tr>
            <td><strong>Doors (Units)</strong></td>
            <td>'.$calculation->doors.'</td>
             <td><strong>Corners</strong></td>
            <td>'.$calculation->corners.'</td>
            <td><strong>Corner pieces</strong></td>
            <td>'.$calculation->corner_pieces.'</td>
            <td><strong>Interior/Exterior</strong></td>
            <td>'.$calculation->interior_exterior.'</td>
        </tr>
    </table>

    <p style="margin-top:10px;">
    </p>

    <h3>Materials</h3>
    <table width="100%" border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-family:Arial, sans-serif;">
        <tr>
            <td><strong>Sleepers</strong></td>
            <td>'.$calculation->sleepers.'</td>
            <td><strong>Screws (1 lb)</strong></td>
            <td>'.$calculation->screws.'</td>
            <td><strong>Wood Reinforcement (1"x2"x8)</strong></td>
            <td>'.$calculation->wood_reinforcement.'</td>
        </tr>
        <tr>
            <td><strong>Nails</strong></td>
            <td>'.$calculation->nails.'</td>
            <td><strong>Structural Screws</strong></td>
            <td>'.$calculation->structural_screws.'</td>
            <td><strong>Panels</strong></td>
            <td>'.$calculation->panels.'</td>
        </tr>
        <tr>
            <td><strong>Studs</strong></td>
            <td>'.$calculation->studs.'</td>
            <td><strong>Putty - Bucket</strong></td>
            <td>'.$calculation->putty.'</td>
            <td><strong>Fasteners</strong></td>
            <td>'.$calculation->fasteners.'</td>
        </tr>
        <tr>
            <td><strong>Corner Beads</strong></td>
            <td>'.$calculation->corner_beads.'</td>
            <td><strong>Cement</strong></td>
            <td>'.$calculation->cement.'</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    ';

        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        // Output to browser (inline)
        // 1) Inline in browser
        // $mpdf->Output();

        // 2) Force download
        return   $mpdf->Output('', 'S');
    }
}
