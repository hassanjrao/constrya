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
                            <th>{{ __('Metros Lineares') }}</th>
                            <th>{{ __('Height') }}</th>
                            <th>{{ __('Sides') }}</th>
                            <th>{{ __('Profile') }}</th>
                            <th>{{ __('Finish') }}</th>
                            <th>{{ __('Tape') }}</th>
                            <th>{{ __('Doors') }}</th>
                            <th>{{ __('Corners') }}</th>
                            <th>{{ __('Corner Pieces') }}</th>
                            <th>{{ __('Interior/Exterior') }}</th>
                            <th>{{ __('M2') }}</th>
                            <th>{{ __('Sleepers') }}</th>
                            <th>{{ __('Studs') }}</th>
                            <th>{{ __('Structural Screws') }}</th>
                            <th>{{ __('Nails') }}</th>
                            <th>{{ __('Tapes') }}</th>
                            <th>{{ __('Screws') }}</th>
                            <th>{{ __('Putty') }}</th>
                            <th>{{ __('Corner Beads') }}</th>
                            <th>{{ __('Panels') }}</th>
                            <th>{{ __('Fasteners') }}</th>
                            <th>{{ __('Cement') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Action') }}</th>

                        </tr>


                    </thead>

                    <tbody>
                        @foreach ($calculations as $ind => $cal)
                            <tr>

                                <td>{{ $ind + 1 }}</td>
                                <td>{{ $cal->metros_lineares }}</td>
                                <td>{{ $cal->height }}</td>
                                <td>{{ $cal->sides }}</td>
                                <td>{{ $cal->profile }}</td>
                                <td>{{ $cal->finish }}</td>
                                <td>{{ $cal->tape }}</td>
                                <td>{{ $cal->doors }}</td>
                                <td>{{ $cal->corners }}</td>
                                <td>{{ $cal->corner_pieces }}</td>
                                <td>{{ $cal->interior_exterior }}</td>
                                <td>{{ $cal->m2box }}</td>
                                <td>{{ $cal->sleepers }}</td>
                                <td>{{ $cal->studs }}</td>
                                <td>{{ $cal->structural_screws }}</td>
                                <td>{{ $cal->nails }}</td>
                                <td>{{ $cal->tapes }}</td>
                                <td>{{ $cal->screws }}</td>
                                <td>{{ $cal->putty }}</td>
                                <td>{{ $cal->corner_beads }}</td>
                                <td>{{ $cal->panels }}</td>
                                <td>{{ $cal->fasteners }}</td>
                                <td>{{ $cal->cement }}</td>

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
