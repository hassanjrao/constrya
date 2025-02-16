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
                            Esta herramienta ha sido diseñada para brindar un cálculo aproximado, teniendo en cuenta ciertos
                            parámetros estándar. Sin embargo, es importante tener en cuenta que cada instalación puede
                            presentar particularidades que no se consideran en este cálculo general.
                        </p>
                        <form class="ajaxform2" autocomplete="off" id="calForm" method="POST" action="{{ route('flat-roof.calculate') }}">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">Largo *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="largo" name="largo" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Ancho *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="ancho" name="ancho" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Perímetro ML *</label>
                                    <div id="perimetro_ml" class="form-control bg-white text-center"></div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">M2 Espacio *</label>
                                    <div id="m2" class="form-control bg-white text-center"></div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">Perfiles Metálicos @ 60cm *</label>
                                    <select id="perfiles" class="form-select" name="perfiles">
                                        <option>2 1/2 cal .25</option>
                                        <option>2 1/2 cal .22</option>
                                        <option>1 5/8 cal .25</option>
                                        <option>1 5/8 cal .22</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Acabado *</label>
                                    <select name="acabado" id="acabado" class="form-select">
                                        <option>Masilla</option>
                                        <option>Empañete</option>
                                        <option>Sin terminación</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Tipo de Plancha *</label>
                                    <select name="tipo_plancha" id="tipo_plancha" class="form-select">
                                        <option>Sheetrock</option>
                                        <option>Densglass</option>
                                        <option>Durock</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Cinta *</label>
                                    <select name="tipo_cinta" id="tipo_cinta" class="form-select">
                                        <option>Papel</option>
                                        <option>Malla</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-3 mb-3">
                                <input type="button" id='resetBtn' value="Reset" class="btn btn-alt-secondary">
                                <button id="copyBtn" type="button" class="btn btn-alt-primary">Copy</button>
                                <input type="submit" value="Calculate" id="calculateBtn" class="btn btn-alt-success">

                            </div>

                        </form>

                        <div id="materiales">
                            <div class="p-4 bg-light rounded mb-4">
                                <h3 class="fw-bold mb-2 text-primary fs-6">MATERIALES</h3>
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">UND DURMIENTES</label>
                                        <div id="d_und" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">UND parales</label>
                                        <div id="p_und" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">UND PLANCHAS</label>
                                        <div id="pl_und" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">GALÓN CADA 4 PLANCHAS</label>
                                        <div id="m_galon_4_planchas"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">CUBETAS DE MASILLA UNA CARA</label>
                                        <div id="m_cubeta_4_planchas"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">TORNILLOS DE PLANCHA</label>
                                        <div id="to_tornillos_plancha"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">TORNILLO DE ESTRUCTURA</label>
                                        <div id="to_tornillos_estructura"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">CLAVOS PIN</label>
                                        <div id="to_clavos_pin"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">FULMINANTES</label>
                                        <div id="to_fulminantes"
                                            class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">UND CINTA 250</label>
                                        <div id="cinta" class="border w-100 text-center bg-white fw-semibold py-2">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">Precio M2</label>
                                        <input type="number" step="any" min="0" placeholder="0"
                                            value="350" required name="mano_precio" id="mano_precio"
                                            class="form-control bg-warning-light">
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <label class="text-uppercase fw-semibold small">Mano de obra</label>
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
        let v = {};

        function calcular() {
            v.largo = parseFloat($('#largo').val());
            v.ancho = parseFloat($('#ancho').val());
            v.mano_precio = parseFloat($('#mano_precio').val());

            v.perimetro_ml = (v.largo + v.ancho) * 2;
            v.m2 = (v.largo * v.ancho);
            v.durmientes_ml = v.perimetro_ml;
            v.durmientes_und = v.perimetro_ml / 3.05;
            v.durmientes_und_cal1 = (v.durmientes_und * 0.05) + v.durmientes_und;

            v.parales_ancho = v.ancho;
            v.parales_largo = v.largo;
            v.parales_und_largo = v.parales_largo / 1.21 * v.parales_ancho / 3.05;
            v.parales_und_ancho = v.parales_ancho / 0.61 * v.parales_largo / 3.05;
            v.parales = v.parales_und_largo + v.parales_und_ancho;

            v.equineros_ml = v.perimetro_ml;
            v.equineros = (v.equineros_ml * 2) / 3.05;
            v.equineros_mas = Math.ceil((v.equineros * 0.05) + v.equineros);

            v.planchas_m2 = v.m2;
            v.planchas = v.planchas_m2 / 2.97;
            v.planchas_redondeo = Math.round(v.planchas);

            v.esquineros_ml = v.perimetro_ml;
            v.esquineros = (v.esquineros_ml * 2) / 3.05;
            v.esquineros_calc1 = (v.esquineros * 0.05) + v.esquineros;

            v.mano_obra = v.mano_precio * v.m2;

            v.masilla_galones = v.planchas / 4;
            v.masilla_cubetas = Math.ceil(v.planchas_redondeo / 10);

            v.tornillos_plancha = v.planchas * 36 / 265;
            v.tornillo_estructura = v.parales * 28 / 430;
            v.clavos_pin = v.largo / 0.61 * v.ancho / 1.21 + v.durmientes_und * 5;
            v.fulminantes = v.clavos_pin;
            v.cinta = v.planchas * 8.75 / 250;

            $('#perimetro_ml').text(v.perimetro_ml.toFixed(2));
            $('#m2').text(v.m2.toFixed(2));
            $('#d_ml').text(v.durmientes_ml.toFixed(2));
            $('#d_und').text(Math.round(v.durmientes_und_cal1).toFixed(2));
            $('#m_galon_4_planchas').text(v.masilla_galones.toFixed(2));
            $('#m_cubeta_4_planchas').text(v.masilla_cubetas.toFixed(2));
            $('#to_tornillos_plancha').text(v.tornillos_plancha.toFixed(2));
            $('#to_tornillos_estructura').text(v.tornillo_estructura.toFixed(2));
            $('#to_clavos_pin').text(v.clavos_pin.toFixed(2));
            $('#to_fulminantes').text(v.fulminantes.toFixed(2));
            $('#cinta').text(Math.ceil(v.cinta));
            $('#p_largo').text(v.parales_largo.toFixed(2));
            $('#p_ancho').text(v.parales_ancho.toFixed(2));
            $('#p_und_largo').text(v.parales_und_largo.toFixed(2));
            $('#p_und_ancho').text(v.parales_und_ancho.toFixed(2));
            $('#p_und').text(Math.ceil(v.parales));
            $('#pl_m2').text(v.planchas_m2.toFixed(2));
            $('#pl_und').text(v.planchas_redondeo.toFixed(2));
            $('#mano_obra').text(v.mano_obra.toFixed(2));
            $('#equineros_ml').text(v.esquineros_ml.toFixed(2));
            $('#equineros').text(v.esquineros.toFixed(2));
            $('#equineros_mas').text(v.equineros_mas.toFixed(2));
            console.log(v);
        }

        $(document).ready(function() {
            calcular();
        });

        // $('input').keyup(function(e) {
        //     calcular();
        // });

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
            alertSuccess('Copied successfully!');
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
                    $('#p_und_largo').text(response.parales_und_largo.toFixed(2));
                    $('#p_und_ancho').text(response.parales_und_ancho.toFixed(2));
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
            calcular();
        });

    </script>
@endpush
