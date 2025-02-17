@extends('layouts.simple')
@section('page-title', __('Plafon Calculator'))

@section('content')
    <!-- Section #2 -->
    <div class="content content-boxed content-full overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h1 class="">
                            {{ __('Plafon Calculator') }}
                        </h1>
                    </div>
                    <div class="block-content block-content-full space-y-3">

                        <form class="ajaxform2" autocomplete="off" id="calForm" method="POST"
                            action="{{ route('plafon.calculate') }}">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Largo') }} *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="largo" name="largo" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Ancho') }} *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="ancho" name="ancho" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('UNIDAD') }}</label>
                                    <select name="unidad" id="unidad" class="form-select">
                                        <option value="m">{{ __('Metros') }}</option>
                                        <option value="ft">{{ __('Pies') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Tamaño del panel') }}</label>
                                    <select name="panel_size" id="panel_size" class="form-select">
                                        <option value="2x2">2x2</option>
                                        <option value="2x4">2x4</option>
                                    </select>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end gap-3 mb-3">
                                <input type="button" id='resetBtn' value="{{ __('Reiniciar') }}"
                                    class="btn btn-alt-secondary">
                                <button id="copyBtn" type="button"
                                    class="btn btn-alt-primary">{{ __('Copiar') }}</button>
                                <input type="submit" value="{{ __('Calcular') }}" id="calculateBtn"
                                    class="btn btn-alt-success">
                            </div>

                        </form>

                        <div id="materiales">
                            <div class="p-4 bg-light rounded mb-4">
                                <h3 class="fw-bold mb-2 text-primary fs-6">{{ __('MATERIALES') }}</h3>
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Cantidad de Paneles') }}</label>
                                        <div id="panel_count" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Cantidad de Main Tee') }}</label>
                                        <div id="main_tee_count" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Cantidad de Cross Tee4') }}</label>
                                        <div id="cross_tee4_count" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Cantidad de Cross Tee2') }}</label>
                                        <div id="cross_tee2_count" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Cantidad de Angular') }}</label>
                                        <div id="angular_count" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Cantidad de Suspensión') }}</label>
                                        <div id="suspension_count" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Clavo Tipo L') }}</label>
                                        <div id="clavos_tipo_l" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Fulminantes') }}</label>
                                        <div id="fulminantes" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


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
        const calculateBtn = $('#calculate');
        const copyBtn = $('#copyBtn');
        const resetBtn = $('#resetBtn');


        $(document).ready(function() {
            // set default values for materials
            setDefaultValues();

        });

        function setDefaultValues() {
            $('#panel_count').text('0.00');
            $('#main_tee_count').text('0.00');
            $('#cross_tee4_count').text('0.00');
            $('#cross_tee2_count').text('0.00');
            $('#angular_count').text('0.00');
            $('#suspension_count').text('0.00');
            $('#clavos_tipo_l').text('0.00');
            $('#fulminantes').text('0.00');
        }

        // $('input').keyup(function(e) {
        //     calcular();
        // });

        $('#copyBtn').click(function(e) {
            e.preventDefault();
            let largo = $('#largo').val();
            let ancho = $('#ancho').val();
            let unidad = $('#unidad').val();
            let panel_size = $('#panel_size').val();


            let texto = `
                    => Largo: ${largo}
                    => Ancho: ${ancho}
                    => Unidad: ${unidad}
                    => Panel Size: ${panel_size}
                    # MATERIALES ###############\n`;

            $('#materiales label').each(function(index, element) {
                let label = $(this).text().trim().toLowerCase();
                let valor = $(this).parent('div').children('div').text().trim();
                texto = texto + `=> ${label} : ${valor} \n`;
            });

            let $temp = $('<textarea>');
            $('body').append($temp);
            $temp.val(texto).select();
            document.execCommand('copy');
            $temp.remove();
            alertSuccess("{!! __('Copiado al portapapeles') !!}");
        });


        $('#calForm').submit(function(e) {
            e.preventDefault();
            var form = $(this);

            calculateBtn.prop('disabled', true);


            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    console.log('success', response);

                    $('#panel_count').text(response.panel_count.toFixed(2));
                    $('#main_tee_count').text(response.main_tee_count.toFixed(2));
                    $('#cross_tee4_count').text(response.cross_tee4_count.toFixed(2));
                    $('#cross_tee2_count').text(response.cross_tee2_count.toFixed(2));
                    $('#angular_count').text(response.angular_count.toFixed(2));
                    $('#suspension_count').text(response.suspension_count.toFixed(2));
                    $('#clavos_tipo_l').text(response.clavos_tipo_l.toFixed(2));
                    $('#fulminantes').text(response.fulminantes.toFixed(2));


                    calculateBtn.prop('disabled', false);
                    copyBtn.prop('disabled', false);
                    resetBtn.prop('disabled', false);

                },
                error: function(response) {
                    console.log('error', response);
                    calculateBtn.prop('disabled', false);
                }
            });

        });

        $('#resetBtn').click(function(e) {
            e.preventDefault();
            $('#calForm').trigger('reset');
            setDefaultValues();
        });
    </script>
@endpush
