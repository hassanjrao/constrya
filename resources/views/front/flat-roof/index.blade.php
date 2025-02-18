@extends('layouts.simple')
@section('page-title', __('Flat Roof Calculator'))

@section('content')
    <!-- Section #2 -->
    <div class="content content-boxed content-full overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h1 class="">
                            {{ __('Flat Roof Calculator') }}
                        </h1>
                    </div>
                    <div class="block-content block-content-full space-y-3">
                        <p class="alert alert-secondary p-3 text-xs mb-5">
                            {{ __('Esta herramienta ha sido diseñada para brindar un cálculo aproximado, teniendo en cuenta ciertos
                                                                                                                                            parámetros estándar. Sin embargo, es importante tener en cuenta que cada instalación puede
                                                                                                                                            presentar particularidades que no se consideran en este cálculo general.') }}
                        </p>
                        <form class="ajaxform2" autocomplete="off" id="calForm" method="POST"
                            action="{{ route('flat-roof.calculate') }}">
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
                                    <label class="form-label">{{ __('Perímetro ML') }} *</label>
                                    <div id="perimetro_ml" class="form-control bg-white text-center"></div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('M2 Espacio') }} *</label>
                                    <div id="m2" class="form-control bg-white text-center"></div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Perfiles Metálicos @ 60cm') }} *</label>
                                    <select id="perfiles" class="form-select" name="perfiles">
                                        <option>2 1/2 cal .25</option>
                                        <option>2 1/2 cal .22</option>
                                        <option>1 5/8 cal .25</option>
                                        <option>1 5/8 cal .22</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Acabado') }} *</label>
                                    <select name="acabado" id="acabado" class="form-select">
                                        <option>{{ __('Masilla') }}</option>
                                        <option>{{ __('Empañete') }}</option>
                                        <option>{{ __('Sin terminación') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Tipo de Plancha') }} *</label>
                                    <select name="tipo_plancha" id="tipo_plancha" class="form-select">
                                        <option>{{ __('Sheetrock') }}</option>
                                        <option>{{ __('Densglass') }}</option>
                                        <option>{{ __('Durock') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Cinta') }} *</label>
                                    <select name="tipo_cinta" id="tipo_cinta" class="form-select">
                                        <option>{{ __('Papel') }}</option>
                                        <option>{{ __('Malla') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-3 mb-3">
                                <input type="submit" value="{{ __('Calcular') }}" id="calculateBtn"
                                class="btn btn-alt-success">
                                <input type="button" id='resetBtn' value="{{ __('Reiniciar') }}"
                                    class="btn btn-alt-secondary">
                                <button id="copyBtn" type="button"
                                    class="btn btn-alt-primary">{{ __('Copiar') }}</button>


                            </div>
                            <div class="d-flex justify-content-end gap-3 mb-3">

                                @if (userSubscribed())
                                    <div class="d-flex justify-content-end gap-3 mt-3">
                                        <button id="providerBtn" onclick="sendToProviders()" class="btn btn-alt-primary">
                                            {{ __('Enviar a Proveedores') }}
                                        </button>
                                        <button id="automaticQuoteBtn" onclick="automaticQuote()" class="btn btn-alt-info">
                                            {{ __('Cotización automática') }}
                                        </button>
                                    </div>
                                @endif
                            </div>

                        </form>

                        <div id="materiales">
                            <div class="p-4 bg-light rounded mb-4">
                                <h3 class="fw-bold mb-2 text-primary fs-6">{{ __('MATERIALES') }}</h3>
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('UND DURMIENTES') }}</label>
                                        <div id="d_und" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('UND parales') }}</label>
                                        <div id="p_und" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('UND PLANCHAS') }}</label>
                                        <div id="pl_und" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label
                                            class="text-uppercase fw-semibold small">{{ __('GALÓN CADA 4 PLANCHAS') }}</label>
                                        <div id="m_galon_4_planchas"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label
                                            class="text-uppercase fw-semibold small">{{ __('CUBETAS DE MASILLA UNA CARA') }}</label>
                                        <div id="m_cubeta_4_planchas"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label
                                            class="text-uppercase fw-semibold small">{{ __('TORNILLOS DE PLANCHA') }}</label>
                                        <div id="to_tornillos_plancha"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label
                                            class="text-uppercase fw-semibold small">{{ __('TORNILLO DE ESTRUCTURA') }}</label>
                                        <div id="to_tornillos_estructura"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('CLAVOS PIN') }}</label>
                                        <div id="to_clavos_pin"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('FULMINANTES') }}</label>
                                        <div id="to_fulminantes"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('UND CINTA 250') }}</label>
                                        <div id="cinta" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Precio M2') }}</label>
                                        <input type="number" step="any" min="0" placeholder="0"
                                            value="350" required name="mano_precio" id="mano_precio"
                                            class="form-control bg-warning-light">
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">{{ __('Mano de obra') }}</label>
                                        <div id="mano_obra" class="border w-100 text-center bg-white fw-semibold py-2">
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
        const providerBtn = $('#providerBtn');
        const automaticQuoteBtn = $('#automaticQuoteBtn');


        providerBtn.prop('disabled', true);

        let v = {};


        $(document).ready(function() {
            setDefaultValues();
        });


        $('#copyBtn').click(function(e) {
            e.preventDefault();
            let perfiles = $('#perfiles').val();
            let acabado = $('#acabado').val();
            let tipo_plancha = $('#tipo_plancha').val();
            let tipo_cinta = $('#tipo_cinta').val();
            let tipo_esquineros = $('#tipo_esquineros').val();

            let texto = `
                    => Perfiles Metálicos: ${perfiles}
                    => Acabado: ${acabado}
                    => Tipo Plancha: ${tipo_plancha}
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

            // add mano_precio to the form
            form.append('<input type="hidden" name="mano_precio" value="' + $('#mano_precio').val() + '">');

            calculateBtn.prop('disabled', true);


            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    console.log('success', response);



                    $('#perimetro_ml').text(response.perimetro_ml.toFixed(2));
                    $('#m2').text(response.m2.toFixed(2));
                    $('#d_ml').text(response.durmientes_ml.toFixed(2));
                    $('#d_und').text(Math.round(response.durmientes_und).toFixed(2));
                    $('#m_galon_4_planchas').text(response.masilla_galones.toFixed(2));
                    $('#m_cubeta_4_planchas').text(response.masilla_cubetas.toFixed(2));
                    $('#to_tornillos_plancha').text(response.tornillos_plancha.toFixed(2));
                    $('#to_tornillos_estructura').text(response.tornillo_estructura.toFixed(2));
                    $('#to_clavos_pin').text(response.clavos_pin.toFixed(2));
                    $('#to_fulminantes').text(response.fulminantes.toFixed(2));
                    $('#cinta').text(response.cinta.toFixed(2));
                    $('#p_largo').text(response.parales_largo.toFixed(2));
                    $('#p_ancho').text(response.parales_ancho.toFixed(2));
                    $('#p_und').text(response.parales.toFixed(2));
                    $('#pl_m2').text(response.planchas_m2.toFixed(2));
                    $('#pl_und').text(response.planchas.toFixed(2));
                    $('#mano_obra').text(response.mano_obra.toFixed(2));
                    $('#equineros_ml').text(response.esquineros_ml.toFixed(2));
                    $('#equineros').text(response.esquineros.toFixed(2));
                    $('#equineros_mas').text(response.esquineros_mas.toFixed(2));


                    calculateBtn.prop('disabled', false);
                    copyBtn.prop('disabled', false);
                    resetBtn.prop('disabled', false);


                    if (response.calculationId) {
                        // create hidden input for calculation id
                        let input =
                            `<input type="hidden" name="calculation_id" id="calculation_id" value="${response.calculationId}">`;

                        form.append(input);

                        providerBtn.prop('disabled', false);
                        automaticQuoteBtn.prop('disabled', false);

                    }

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

        function setDefaultValues() {


            $('#perimetro_ml').text(0.00);
            $('#m2').text(0.00);
            $('#d_ml').text(0.00);
            $('#d_und').text(0.00);
            $('#m_galon_4_planchas').text(0.00);
            $('#m_cubeta_4_planchas').text(0.00);
            $('#to_tornillos_plancha').text(0.00);
            $('#to_tornillos_estructura').text(0.00);
            $('#to_clavos_pin').text(0.00);
            $('#to_fulminantes').text(0.00);
            $('#cinta').text(0.00);
            $('#p_largo').text(0.00);
            $('#p_ancho').text(0.00);
            $('#p_und').text(0.00);
            $('#pl_m2').text(0.00);
            $('#pl_und').text(0.00);
            $('#mano_obra').text(0.00);
            $('#equineros_ml').text(0.00);
            $('#equineros').text(0.00);
            $('#equineros_mas').text(0.00);
        }

        function sendToProviders() {

            providerBtn.prop('disabled', true);

            $.ajax({
                url: "{{ route('user.send-to-providers.flat-roof') }}",
                type: 'POST',
                data: $('#calForm').serialize(),
                success: function(response) {
                    console.log('success', response);
                    alertSuccess('Sent to providers successfully');
                    providerBtn.prop('disabled', false);
                },
                error: function(response) {
                    console.log('error', response);
                    alertError('Error sending to providers');
                    providerBtn.prop('disabled', false);
                }
            });

        }


        function automaticQuote() {

            // open a new window by passing calculation_id as query param

            let calculationId = $('#calculation_id').val();

            if (calculationId) {
                window.open("{{ route('user.automatic-quote.flat-roof') }}?calculation_id=" + calculationId, '_blank');
            } else {
                alertError("{!! __('Primero calcule los materiales') !!}");
            }

        }
    </script>
@endpush
