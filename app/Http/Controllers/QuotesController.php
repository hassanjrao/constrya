<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class QuotesController extends Controller
{

    public function generateQuotation(Request $request){
        $request->validate([
            'materials' => 'required|array',
            'quantity' => 'required|array',
            'name' => 'required|string'
        ]);

        $data = [];

        $materials = $request->materials;
        $quantity = $request->quantity;

        $quotation=Quotation::create([
            'client_name'=>$request->name,
            'user_id'=>1
        ]);


        foreach ($materials as $ind => $material) {
            $data[] = [
                'material_id' => $material,
                'quantity' => $quantity[$ind],
                'quotation_id' => $quotation->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        QuotationItem::insert($data);

        $pdf=$this->createPDF($quotation,$data);


         $pdf->Output('cotizaciones.pdf', 'D');


    }


    public function createPDF($quotation,$data)
    {
        // Create mPDF object
        $mpdf = new Mpdf();

        $logoUrl = asset('media/logos/logo.png');

        // Header HTML
        $headerHtml = '
                    <table width="100%" style="border:none !important">
                        <tr style="border:none !important">
                            <td align="center" style="width: 60%; text-align:center; border:none !important">
                               
                                <h2>Gullone Infraestructura S.R.L.</h2>
                                <h5>  RNC: 132-18351-7</h5>
                                <h5>Calle Principal Juan Dolio, San Pedro Macoris</h5>
                                <h5>Cel. 829.862.7077</h5>
                            </td>
                            <td align="left" style="width: 40%; border:none !important">
                                <h2>Cotizacion: ' . $quotation->id . '</h2>
                                <br><br>
                                <h4>Fecha: ' . date('Y-m-d') . '</h4>
                                <br><br>
                                <h4>Cliente: ' . $quotation->client_name . '</h4>
                            </td>

                        </tr>
                    </table>
                    <br>
                ';
                        // Table header HTML
        $tableHeaderHtml = '
                    <thead>
                        <tr style="background-color: #ddd;">
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                ';

        $subTotal = 0;
        $total = 0;
        $taxPercentage=18;

        $items=$quotation->quotationItems()->with('material')->get();

        // Table body HTML (example data)
        $tableBodyHtml =
            '<tbody>';

        foreach ($items as $item) {
            $material = $item->material;
            $tableBodyHtml .= '
            <tr>
                <td>' . $material->name . '</td>
                <td>' . $item->quantity . '</td>
                <td>$' . $material->price_per_unit . '</td>
                <td>$' . number_format(($material->price_per_unit * $item->quantity),2) . '</td>
            </tr>';

            $total += $material->price_per_unit * $item->quantity;
        }

        $tax=($total*$taxPercentage)/100;

        $subTotal=$total-$tax;

        $tableBodyHtml .= '</tbody>';


        // Table footer HTML
        $tableFooterHtml = '
                <tfoot>
                    <tr>
                        <td colspan="3" align="right"><strong>Sub Total:</strong></td>
                        <td>$' . number_format(($subTotal),2) . '</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"><strong>ITBIS ('.$taxPercentage.'%):</strong></td>
                        <td>$' . number_format(($tax),2) . '</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"><strong>Total:</strong></td>
                        <td>$' . number_format(($total),2) . '</td>
                    </tr>
                </tfoot>
            ';

        // Full HTML content
        $html = '
                <html>
                <head>
                    <style>
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                    </style>
                </head>
                <body>
                    ' . $headerHtml . '
                    <table>
                        ' . $tableHeaderHtml . '
                        ' . $tableBodyHtml . '
                        ' . $tableFooterHtml . '
                    </table>
                </body>
                </html>
            ';

            // add footer

            $mpdf->SetHTMLFooter('
                <table width="100%" style="border:none !important">
                    <tr style="border:none !important">
                        <td style="width: 60%; text-align:left; border:none !important">
                            <h5>Cuentas Bancarias:</h5>
                            <h5>Banco Popular: 778387696 - Sr. Giordy Gullone</h5>
                            <h5>Banco BHD: 26465160011 - Sr. Giordy Gullone</h5>

                        </td>


                    </tr>
                </table>
                ');


        // Load HTML content
        $mpdf->WriteHTML($html);

        return $mpdf;
    }
}
