@extends('layouts.simple')
@section('page-title', __('Facias'))

@section('content')
    <!-- Section #2 -->
    <div class="content content-boxed content-full overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h1 class="">
                            {{ __('Facias') }}
                        </h1>
                    </div>
                    <div class="block-content block-content-full space-y-3">
                        <form autocomplete="off" id="calForm" method="POST" action="{{ route('facias.calculate') }}">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Length') }} *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        name="largo" required id="largo" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Width') }} *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        name="ancho" required id="ancho" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Perimeter ML') }} *</label>
                                    <div id="perimetro_ml" class="form-control text-center bg-light">0.00</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('M² Space') }} *</label>
                                    <div id="m2" class="form-control text-center bg-light">0.00</div>
                                </div>
                            </div>

                            <div class="row mb-3 border p-3 rounded mb-5">
                                <div class="col-md-2">
                                    <label class="form-label">A</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="a" name="a" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">B</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="b" name="b" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">C</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="c" name="c" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">D</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="d" name="d" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('M² Fascia') }}</label>
                                    <div id="m2_facia" class="form-control text-center bg-light">0.00</div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Metal Profiles @ 60cm') }} *</label>
                                    <select id="profiles" class="form-select" name="profiles" required>
                                        <option>2 1/2 cal .25</option>
                                        <option>2 1/2 cal .22</option>
                                        <option>1 5/8 cal .25</option>
                                        <option>1 5/8 cal .22</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Finish') }} *</label>
                                    <select id="acabado" class="form-select" name="acabado" required>
                                        <option>{{ __('Putty') }}</option>
                                        <option>{{ __('Plaster') }}</option>
                                        <option>{{ __('No Finish') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Board Type') }} *</label>
                                    <select id="tipo_plancha" class="form-select" name="tipo_plancha" required>
                                        <option>{{ __('Sheetrock') }}</option>
                                        <option>{{ __('Densglass') }}</option>
                                        <option>{{ __('Durock') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Tape') }} *</label>
                                    <select id="tipo_cinta" class="form-select" name="tipo_cinta" required>
                                        <option>{{ __('Paper') }}</option>
                                        <option>{{ __('Mesh') }}</option>
                                    </select>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end gap-3 mb-3">
                                <input type="button" id='resetBtn' value="{{ __('Reset') }}" class="btn btn-alt-secondary">
                                <button id="copyBtn" type="button" class="btn btn-alt-primary">{{ __('Copy') }}</button>
                                <input type="submit" value="{{ __('Calculate') }}" id="calculateBtn" class="btn btn-alt-success">

                            </div>
                        </form>

                        <div id="materials" class="mb-5">
                            <div class="p-5 bg-light rounded mb-5">
                                <h3 class="fw-bold mb-2 text-primary text-sm">{{ __('MATERIALS') }}</h3>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('UNIT SLEEPERS') }}</label>
                                        <div id="d_und" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('UNIT SECTIONS') }}</label>
                                        <div id="p_und_secciones" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('UNIT PARALLELS') }}</label>
                                        <div id="p_und" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('UNIT SHEETS') }}</label>
                                        <div id="pl_und" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('GALLON PER 4 SHEETS') }}</label>
                                        <div id="m_galon_4_planchas" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('BUCKETS OF PUTTY ONE SIDE') }}</label>
                                        <div id="m_cubeta_4_planchas" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('SHEET SCREWS (POUND)') }}</label>
                                        <div id="to_tornillos_plancha"
                                            class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('STRUCTURE SCREWS') }}</label>
                                        <div id="to_tornillos_estructura"
                                            class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('PIN NAILS') }}</label>
                                        <div id="to_clavos_pin" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('DETONATORS') }}</label>
                                        <div id="to_fulminantes" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('UNIT TAPE 250') }}</label>
                                        <div id="cinta" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 bg-light rounded mb-5">
                                <h3 class="fw-bold mb-2 text-primary text-sm">{{ __('LABOR') }}</h3>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-4">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('Labor Fascia 3 Sides') }}</label>
                                        <div id="mano_obra_3" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('Labor Fascia 5 Sides') }}</label>
                                        <div id="mano_obra_5" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-uppercase text-secondary fw-semibold">{{ __('Labor Fascia 2 Sides') }}</label>
                                        <div id="mano_obra_2" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
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
        const calculateBtn = $('#calculateBtn');
        const copyBtn = $('#copyBtn');
        const resetBtn = $('#resetBtn');
        let v = {};


        $('#copyBtn').click(function(e) {
            e.preventDefault();
            let profiles = $('#profiles').val();
            let finish = $('#finish').val();
            let sheet_type = $('#sheet_type').val();
            let tape_type = $('#tape_type').val();
            let corner_type = $('#corner_type').val();

            let text = `
                => Metal Profiles: ${profiles}
                => Finish: ${finish}
                => Sheet Type: ${sheet_type}
                => Corner Type: ${corner_type}\n
                # MATERIALS ###############\n`;

            $('#materials label').each(function(index, element) {
                let label = $(this).text().trim().toLowerCase();
                let value = $(this).parent('div').children('div').text().trim();
                text = text + `=> ${label} : ${value} \n`;
            });

            let $temp = $('<textarea>');
            $('body').append($temp);
            $temp.val(text).select();
            document.execCommand('copy');
            $temp.remove();
            alertSuccess('Copied successfully!');
        });

        $('#resetBtn').click(function(e) {
            e.preventDefault();
            $('#calForm').trigger('reset');
            $('#perimetro_ml').text('0.00');
            $('#m2').text('0.00');
            $('#d_ml').text('0.00');
            $('#d_und').text('0.00');
            $('#p_und_secciones').text('0.00');
            $('#p_und').text('0.00');
            $('#pl_m2').text('0.00');
            $('#pl_und').text('0.00');
            $('#m_galon_4_planchas').text('0.00');
            $('#m_cubeta_4_planchas').text('0.00');
            $('#to_tornillos_plancha').text('0.00');
            $('#to_tornillos_estructura').text('0.00');
            $('#to_clavos_pin').text('0.00');
            $('#to_fulminantes').text('0.00');
            $('#cinta').text('0.00');
            $('#mano_obra_3').text('0.00');
            $('#mano_obra_5').text('0.00');
            $('#mano_obra_2').text('0.00');
            $('#m2_facia').text('0.00');
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


                    $('#perimetro_ml').text(response.perimetro_ml);
                    $('#m2').text(response.m2);
                    $('#d_ml').text(response.durmientes_ml);
                    $('#d_und').text(Math.round(response.durmientes_und));
                    $('#p_und_secciones').text(response.parales_secciones);
                    $('#p_und').text(response.parales);
                    $('#pl_m2').text(response.m2_facias);
                    $('#pl_und').text(response.planchas);
                    $('#m_galon_4_planchas').text(response.masilla_galones);
                    $('#m_cubeta_4_planchas').text(response.masilla_cubetas);
                    $('#to_tornillos_plancha').text(Math.ceil(response.tornillos_plancha));
                    $('#to_tornillos_estructura').text(response.tornillo_estructura);
                    $('#to_clavos_pin').text(response.clavos_pin);
                    $('#to_fulminantes').text(response.fulminantes);
                    $('#cinta').text(response.cinta);
                    $('#mano_obra_3').text(response.mano_obra_3caras);
                    $('#mano_obra_5').text(response.mano_obra_5caras);
                    $('#mano_obra_2').text(response.mano_obra_2caras);
                    $('#m2_facia').text(response.m2_facias);


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
    </script>
@endpush
