<!-- resources/views/facias_pdf.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Cálculo de Facias') }}</title>
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

    <h2 class="header-title">{{ __('Cálculo de Facias') }}</h2>

    <!-- TABLA DE ENTRADAS BÁSICAS -->
    <table class="table-section">
        <thead>
            <tr>
                <th colspan="8" class="section-title">{{ __('Entradas') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label">{{ __('Longitud') }}</td>
                <td>{{ $faciaCalculation->largo ?? 0 }}</td>
                <td class="label">{{ __('Ancho') }}</td>
                <td>{{ $faciaCalculation->ancho ?? 0 }}</td>
                <td class="label">{{ __('Perímetro ML') }}</td>
                <td>{{ $faciaCalculation->perimetro_ml ?? 0 }}</td>
                <td class="label">{{ __('Espacio M²') }}</td>
                <td>{{ $faciaCalculation->m2 ?? 0 }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('A') }}</td>
                <td>{{ $faciaCalculation->a ?? 0 }}</td>
                <td class="label">{{ __('B') }}</td>
                <td>{{ $faciaCalculation->b ?? 0 }}</td>
                <td class="label">{{ __('C') }}</td>
                <td>{{ $faciaCalculation->c ?? 0 }}</td>
                <td class="label">{{ __('D') }}</td>
                <td>{{ $faciaCalculation->d ?? 0 }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('M² Facia') }}</td>
                <td>{{ $faciaCalculation->m2_facias ?? 0 }}</td>
                <td class="label">{{ __('Perfiles metálicos @ 60cm') }}</td>
                <td>{{ $faciaCalculation->profiles }}</td>
                <td class="label">{{ __('Acabado') }}</td>
                <td>{{ $faciaCalculation->acabado }}</td>
                <td class="label">{{ __('Tipo de Placa') }}</td>
                <td>{{ $faciaCalculation->tipo_plancha }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('Cinta') }}</td>
                <td>{{ $faciaCalculation->tipo_cinta }}</td>
                <td colspan="6"></td>
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
                <td class="label">{{ __('Durmientes (Unidad)') }}</td>
                <td>{{ $faciaCalculation->durmientes_und }}</td>
                <td class="label">{{ __('Secciones (Unidad)') }}</td>
                <td>{{ $faciaCalculation->parales_secciones }}</td>
                <td class="label">{{ __('Paralelos (Unidad)') }}</td>
                <td>{{ $faciaCalculation->parales }}</td>
                <td class="label">{{ __('LÁMINAS (Unidad)') }}</td>
                <td>{{ $faciaCalculation->planchas }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('Galón por 4 tableros') }}</td>
                <td>{{ $faciaCalculation->masilla_galones }}</td>
                <td class="label">{{ __('Cubetas de masilla (un lado)') }}</td>
                <td>{{ $faciaCalculation->masilla_cubetas }}</td>
                <td class="label">{{ __('Tornillos para tablero (libras)') }}</td>
                <td>{{ $faciaCalculation->tornillos_plancha }}</td>
                <td class="label">{{ __('Tornillos estructurales') }}</td>
                <td>{{ $faciaCalculation->tornillo_estructura }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('CLAVOS PIN') }}</td>
                <td>{{ $faciaCalculation->clavos_pin }}</td>
                <td class="label">{{ __('Detonadores') }}</td>
                <td>{{ $faciaCalculation->fulminantes }}</td>
                <td class="label">{{ __('Cinta 250 (Unidad)') }}</td>
                <td>{{ $faciaCalculation->cinta }}</td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>

</body>
</html>
