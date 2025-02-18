<!-- resources/views/flat_roof_pdf.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Calculadora de Techo Plano') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            height: 50px;
        }
        .header-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-section {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .table-section th,
        .table-section td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .section-title {
            background-color: #eee;
            font-weight: bold;
            text-transform: uppercase;
            padding: 8px;
            text-align: center;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ asset('media/logos/logo.png') }}" style="width: 100px; height: 100px" alt="Logo">
    </div>
    <h2 class="header-title">{{ __('Calculadora de Techo Plano') }}</h2>

    <!-- TABLA DE ENTRADAS BÁSICAS -->
    <table class="table-section">
        <thead>
            <tr>
                <th colspan="8" class="section-title">{{ __('Entradas') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label">{{ __('Largo') }}</td>
                <td>{{ $roofCalculation->largo }}</td>
                <td class="label">{{ __('Ancho') }}</td>
                <td>{{ $roofCalculation->ancho }}</td>
                <td class="label">{{ __('Perímetro ML') }}</td>
                <td>{{ $roofCalculation->perimetro_ml }}</td>
                <td class="label">{{ __('M2 Espacio') }}</td>
                <td>{{ $roofCalculation->m2 }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('Perfiles Metálicos @ 60cm') }}</td>
                <td>{{ $roofCalculation->perfiles}}</td>
                <td class="label">{{ __('Acabado') }}</td>
                <td>{{ $roofCalculation->acabado }}</td>
                <td class="label">{{ __('Tipo de Plancha') }}</td>
                <td>{{ $roofCalculation->tipo_plancha }}</td>
                <td class="label">{{ __('Cinta') }}</td>
                <td>{{ $roofCalculation->tipo_cinta }}</td>
            </tr>
        </tbody>
    </table>

    <!-- TABLA DE MATERIALES -->
    <table class="table-section">
        <thead>
            <tr>
                <th colspan="8" class="section-title">{{ __('Materiales') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label">{{ __('UND Durmientes') }}</td>
                <td>{{ $roofCalculation->durmientes_und }}</td>
                <td class="label">{{ __('UND Parales') }}</td>
                <td>{{ $roofCalculation->parales }}</td>
                <td class="label">{{ __('UND Planchas') }}</td>
                <td>{{ $roofCalculation->planchas }}</td>
                <td class="label">{{ __('Galón cada 4 planchas') }}</td>
                <td>{{ $roofCalculation->masilla_galones }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('Cubetas de Masilla una Cara') }}</td>
                <td>{{ $roofCalculation->masilla_cubetas }}</td>
                <td class="label">{{ __('Tornillos de Plancha') }}</td>
                <td>{{ $roofCalculation->tornillos_plancha }}</td>
                <td class="label">{{ __('Tornillo de Estructura') }}</td>
                <td>{{ $roofCalculation->tornillo_estructura }}</td>
                <td class="label">{{ __('Clavos Pin') }}</td>
                <td>{{ $roofCalculation->clavos_pin }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('Fulminantes') }}</td>
                <td>{{ $roofCalculation->fulminantes }}</td>
                <td class="label">{{ __('UND Cinta 250') }}</td>
                <td>{{ $roofCalculation->tipo_cinta }}</td>
                <td class="label">{{ __('Precio M2') }}</td>
                <td>{{ $roofCalculation->mano_precio }}</td>
                <td class="label">{{ __('Mano de Obra') }}</td>
                <td>{{ $roofCalculation->mano_obra }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
