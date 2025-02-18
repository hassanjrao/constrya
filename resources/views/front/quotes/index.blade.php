@extends('layouts.simple')
@section('page-title', __('Obtener cotización'))

@php
    $materials = \App\Models\Material::all();
@endphp

@section('content')
    <!-- Section #2 -->
    <div class="content content-boxed content-full overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h1 class="">
                            <i class="fa fa-calculator"></i> {{ __('Obtener cotización') }}
                        </h1>
                    </div>
                    <div class="block-content block-content-full space-y-3">


                        <form action="{{ route('quotation.generate') }}" method="GET" id="materialForm" target="_blank">
                            <div class="row justify-content-between mb-3">
                                <div class="col-lg-4 mb-2">
                                    <button type="button" onclick="addRow()" class="btn btn-alt-success">
                                        {{ __('Agregar material') }}
                                    </button>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('Cliente') }}" required>
                                </div>
                                <div class="col-lg-4 text-end mb-2">
                                    <input type="submit" id="submitBtn" value="{{ __('Generar') }}"
                                        class="btn btn-alt-primary">
                                </div>
                            </div>

                            <div class="table-responsive">

                                <table class="table table-bordered mb-3">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('Material') }}</th>
                                            <!-- <th scope="col">Price per Unit</th> -->
                                            <th scope="col">{{ __('Cantidad') }}</th>
                                            <th scope="col">{{ __('Acción') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="materialTableBody">
                                        <!-- Table rows will be added dynamically here -->
                                    </tbody>
                                </table>

                            </div>
                        </form>


                        <hr>
                        <div class="section mt-5 mt-5">
                            {!! $calculator->description !!}
                        </div>




                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Section #2 -->
@endsection

@push('scripts')
    <script>
        const materials = @json($materials);

        console.log('materials',materials);

        addRow();
        // Function to add a new row to the table
        function addRow() {
            const tableBody = document.getElementById('materialTableBody');

            const index = tableBody.children.length + 1;


            // Create a new row
            const row = document.createElement('tr');
            row.innerHTML = `
                    <td class="py-2">${index}</td>
                    <td class="py-2">
                        <select name="materials[]" class="form-select" required>
                            <option value="">
                                {{ __('Seleccionar material') }}
                                </option>
                            ${materials.map(material => `<option value="${material.id}">${material.name}</option>`)}
                        </select>
                    </td>
                    <td class="py-2">
                        <input type="number" name="quantity[]" class="form-control" value="1" min="1" required>
                    </td>
                    <td class="py-2">
                        <button type="button" onclick="deleteRow(this)" class="btn btn-alt-danger px-3 py-1">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>

                `;

            // Append the new row to the table
            tableBody.appendChild(row);
        }

        // Function to delete a row
        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
        }
    </script>
@endpush
