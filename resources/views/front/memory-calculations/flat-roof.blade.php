@extends('layouts.simple')
@section('page-title', __('Memory Calculations'))

@section('content')

    <x-memory-bar />

    <div class="block block-rounded">

        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
            <div class="table-responsive">

                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Largo') }}</th>
                            <th>{{ __('Ancho') }}</th>
                            <th>{{ __('Mano Precio') }}</th>
                            <th>{{ __('Perfiles') }}</th>
                            <th>{{ __('Acabado') }}</th>
                            <th>{{ __('Tipo Plancha') }}</th>
                            <th>{{ __('Tipo Cinta') }}</th>
                            <th>{{ __('Perimetro ml') }}</th>
                            <th>{{ __('M2') }}</th>
                            <th>{{ __('Durmientes ml') }}</th>
                            <th>{{ __('Durmientes und') }}</th>
                            <th>{{ __('Parales Ancho') }}</th>
                            <th>{{ __('Parales Largo') }}</th>
                            <th>{{ __('Parales und Largo') }}</th>
                            <th>{{ __('Parales') }}</th>
                            <th>{{ __('Esquineros ml') }}</th>
                            <th>{{ __('Esquineros') }}</th>
                            <th>{{ __('Esquineros mas') }}</th>
                            <th>{{ __('Planchas m2') }}</th>
                            <th>{{ __('Planchas') }}</th>
                            <th>{{ __('Mano Obra') }}</th>
                            <th>{{ __('Masilla Galones') }}</th>
                            <th>{{ __('Masilla Cubetas') }}</th>
                            <th>{{ __('Tornillos Plancha') }}</th>
                            <th>{{ __('Tornillo Estructura') }}</th>
                            <th>{{ __('Clavos Pin') }}</th>
                            <th>{{ __('Fulminantes') }}</th>
                            <th>{{ __('Cinta') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Action') }}</th>

                        </tr>


                    </thead>

                    <tbody>
                        @foreach ($calculations as $ind => $cal)
                            <tr>

                                <td>{{ $ind + 1 }}</td>
                                <td>{{ $cal->largo }}</td>
                                <td>{{ $cal->ancho }}</td>
                                <td>{{ $cal->mano_precio }}</td>
                                <td>{{ $cal->perfiles }}</td>
                                <td>{{ $cal->acabado }}</td>
                                <td>{{ $cal->tipo_plancha }}</td>
                                <td>{{ $cal->tipo_cinta }}</td>
                                <td>{{ $cal->perimetro_ml }}</td>
                                <td>{{ $cal->m2 }}</td>
                                <td>{{ $cal->durmientes_ml }}</td>
                                <td>{{ $cal->durmientes_und }}</td>
                                <td>{{ $cal->parales_ancho }}</td>
                                <td>{{ $cal->parales_largo }}</td>
                                <td>{{ $cal->parales_und_largo }}</td>
                                <td>{{ $cal->parales }}</td>
                                <td>{{ $cal->esquineros_ml }}</td>
                                <td>{{ $cal->esquineros }}</td>
                                <td>{{ $cal->esquineros_mas }}</td>
                                <td>{{ $cal->planchas_m2 }}</td>
                                <td>{{ $cal->planchas }}</td>
                                <td>{{ $cal->mano_obra }}</td>
                                <td>{{ $cal->masilla_galones }}</td>
                                <td>{{ $cal->masilla_cubetas }}</td>
                                <td>{{ $cal->tornillos_plancha }}</td>
                                <td>{{ $cal->tornillo_estructura }}</td>
                                <td>{{ $cal->clavos_pin }}</td>
                                <td>{{ $cal->fulminantes }}</td>
                                <td>{{ $cal->cinta }}</td>

                                <td>{{ $cal->created_at }}</td>

                                <td>

                                </td>


                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
    </div>
@endsection
