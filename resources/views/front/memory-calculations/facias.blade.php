@extends('layouts.simple')
@section('page-title', __('Memory Calculations'))

@section('content')

<x-memory-bar/>

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
                            <th>{{ __('A') }}</th>
                            <th>{{ __('B') }}</th>
                            <th>{{ __('C') }}</th>
                            <th>{{ __('D') }}</th>
                            <th>{{ __('Perimetro ml') }}</th>
                            <th>{{ __('M2') }}</th>
                            <th>{{ __('Durmientes ml') }}</th>
                            <th>{{ __('Durmientes und') }}</th>
                            <th>{{ __('Parales Secciones') }}</th>
                            <th>{{ __('Parales') }}</th>
                            <th>{{ __('M2 Facias') }}</th>
                            <th>{{ __('Planchas') }}</th>
                            <th>{{ __('Masilla Galones') }}</th>
                            <th>{{ __('Masilla Cubetas') }}</th>
                            <th>{{ __('Tornillos Plancha') }}</th>
                            <th>{{ __('Tornillo Estructura') }}</th>
                            <th>{{ __('Clavos Pin') }}</th>
                            <th>{{ __('Fulminantes') }}</th>
                            <th>{{ __('Cinta') }}</th>
                            <th>{{ __('Mano Obra 3caras') }}</th>
                            <th>{{ __('Mano Obra 5caras') }}</th>
                            <th>{{ __('Mano Obra 2caras') }}</th>
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
                                <td>{{ $cal->a }}</td>
                                <td>{{ $cal->b }}</td>
                                <td>{{ $cal->c }}</td>
                                <td>{{ $cal->d }}</td>
                                <td>{{ $cal->perimetro_ml }}</td>
                                <td>{{ $cal->m2 }}</td>
                                <td>{{ $cal->durmientes_ml }}</td>
                                <td>{{ $cal->durmientes_und }}</td>
                                <td>{{ $cal->parales_secciones }}</td>
                                <td>{{ $cal->parales }}</td>
                                <td>{{ $cal->m2_facias }}</td>
                                <td>{{ $cal->planchas }}</td>
                                <td>{{ $cal->masilla_galones }}</td>
                                <td>{{ $cal->masilla_cubetas }}</td>
                                <td>{{ $cal->tornillos_plancha }}</td>
                                <td>{{ $cal->tornillo_estructura }}</td>
                                <td>{{ $cal->clavos_pin }}</td>
                                <td>{{ $cal->fulminantes }}</td>
                                <td>{{ $cal->cinta }}</td>
                                <td>{{ $cal->mano_obra_3caras }}</td>
                                <td>{{ $cal->mano_obra_5caras }}</td>
                                <td>{{ $cal->mano_obra_2caras }}</td>


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
