<!-- resources/views/calculation_pdf.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Cálculo de SheetRock') }}</title>
    <style>
        /* Optional styling for header */
        .header {
            text-align: center;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Header with Logo -->
    <div class="header">
        <img src="{{ asset('media/logos/logo.png') }}"  alt="Logo">
    </div>

    <h2 style="text-align:center;">{{ __('Cálculo de SheetRock') }}</h2>

    <table width="100%" border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-family:Arial, sans-serif;">
        <tr>
            <td><strong>{{ __('Metros lineales') }}</strong></td>
            <td>{{ $calculation->metros_lineares }}</td>
            <td><strong>{{ __('Altura') }}</strong></td>
            <td>{{ $calculation->height }}</td>
            <td><strong>{{ __('1 Lado / 2 Lados') }}</strong></td>
            <td>{{ $calculation->sides }}</td>
            <td><strong>{{ __('M²') }}</strong></td>
            <td>{{ $calculation->m2box }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('Perfiles metálicos a 60cm') }}</strong></td>
            <td>{{ $calculation->profile }}</td>
            <td><strong>{{ __('Acabado') }}</strong></td>
            <td>{{ $calculation->finish }}</td>
            <td><strong>{{ __('Tipo de tablero') }}</strong></td>
            <td>{{ $calculation->board_type }}</td>
            <td><strong>{{ __('Cinta') }}</strong></td>
            <td>{{ $calculation->tape }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('Puertas (Unidades)') }}</strong></td>
            <td>{{ $calculation->doors }}</td>
            <td><strong>{{ __('Esquinas') }}</strong></td>
            <td>{{ $calculation->corners }}</td>
            <td><strong>{{ __('Piezas de esquina') }}</strong></td>
            <td>{{ $calculation->corner_pieces }}</td>
            <td><strong>{{ __('Interior/Exterior') }}</strong></td>
            <td>{{ $calculation->interior_exterior }}</td>
        </tr>
    </table>

    <p style="margin-top:10px;"></p>

    <h3>{{ __('Materiales') }}</h3>
    <table width="100%" border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-family:Arial, sans-serif;">
        <tr>
            <td><strong>{{ __('Durmientes') }}</strong></td>
            <td>{{ $calculation->sleepers }}</td>
            <td><strong>{{ __('Tornillos (1 lb)') }}</strong></td>
            <td>{{ $calculation->screws }}</td>
            <td><strong>{{ __('Refuerzo de madera (1\"x2\"x8)') }}</strong></td>
            <td>{{ $calculation->wood_reinforcement }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('Clavos') }}</strong></td>
            <td>{{ $calculation->nails }}</td>
            <td><strong>{{ __('Tornillos estructurales') }}</strong></td>
            <td>{{ $calculation->structural_screws }}</td>
            <td><strong>{{ __('Paneles') }}</strong></td>
            <td>{{ $calculation->panels }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('Montantes') }}</strong></td>
            <td>{{ $calculation->studs }}</td>
            <td><strong>{{ __('Masilla - Cubeta') }}</strong></td>
            <td>{{ $calculation->putty }}</td>
            <td><strong>{{ __('Sujetadores') }}</strong></td>
            <td>{{ $calculation->fasteners }}</td>
        </tr>
        <tr>
            <td><strong>{{ __('Perfiles de esquina') }}</strong></td>
            <td>{{ $calculation->corner_beads }}</td>
            <td><strong>{{ __('Cemento') }}</strong></td>
            <td>{{ $calculation->cement }}</td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>
