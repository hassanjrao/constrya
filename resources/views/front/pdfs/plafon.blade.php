<!-- resources/views/plafon_pdf.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Calculadora de Plafón') }}</title>
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

      <!-- Logo Header -->
      <div class="header">
        <!-- Replace 'logo.png' with your actual logo file name -->
        <img src="{{ asset('media/logos/logo.png') }}"  alt="Logo">
    </div>

    <h2 class="header-title">{{ __('Calculadora de Plafón') }}</h2>

    <!-- TABLA DE ENTRADAS BÁSICAS -->
    <table class="table-section">
        <thead>
            <tr>
                <th colspan="6" class="section-title">{{ __('Entradas') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="label">{{ __('Largo') }}</td>
                <td>{{ $plafonCalculation->largo }}</td>
                <td class="label">{{ __('Ancho') }}</td>
                <td>{{ $plafonCalculation->ancho }}</td>
                <td class="label">{{ __('Unidad') }}</td>
                <td>{{ $plafonCalculation->unidad }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('Tamaño del panel') }}</td>
                <td>{{ $plafonCalculation->panel_size }}</td>
                <td colspan="4"></td>
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
                <td class="label">{{ __('Cantidad de paneles') }}</td>
                <td>{{ $plafonCalculation->panel_count }}</td>
                <td class="label">{{ __('Cantidad de Main Tee') }}</td>
                <td>{{ $plafonCalculation->main_tee_count }}</td>
                <td class="label">{{ __('Cantidad de Cross Tee2') }}</td>
                <td>{{ $plafonCalculation->cross_tee2_count }}</td>
                <td class="label">{{ __('Cantidad de Cross Tee4') }}</td>
                <td>{{ $plafonCalculation->cross_tee4_count }}</td>
            </tr>
            <tr>
                <td class="label">{{ __('Cantidad de Angular') }}</td>
                <td>{{ $plafonCalculation->angular_count }}</td>
                <td class="label">{{ __('Cantidad de Suspensión') }}</td>
                <td>{{ $plafonCalculation->suspension_count }}</td>
                <td class="label">{{ __('Clavo tipo L') }}</td>
                <td>{{ $plafonCalculation->clavos_tipo_l }}</td>
                <td class="label">{{ __('Fulminantes') }}</td>
                <td>{{ $plafonCalculation->fulminantes }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
