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
                        <form autocomplete="off">
                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">Length *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="largo" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Width *</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="ancho" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Perimeter ML *</label>
                                    <div id="perimetro_ml" class="form-control text-center bg-light">0.00</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">M² Space *</label>
                                    <div id="m2" class="form-control text-center bg-light">0.00</div>
                                </div>
                            </div>

                            <div class="row mb-3 border p-3 rounded mb-5">
                                <div class="col-md-2">
                                    <label class="form-label">A</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="a" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">B</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="b" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">C</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="c" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">D</label>
                                    <input type="number" step="any" min="0" placeholder="0" value="0"
                                        required id="d" class="form-control bg-warning-light">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">M² Fascia</label>
                                    <div id="m2_facia" class="form-control text-center bg-light">0.00</div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label class="form-label">Metal Profiles @ 60cm *</label>
                                    <select id="profiles" class="form-select">
                                        <option>2 1/2 cal .25</option>
                                        <option>2 1/2 cal .22</option>
                                        <option>1 5/8 cal .25</option>
                                        <option>1 5/8 cal .22</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Finish *</label>
                                    <select id="acabado" class="form-select">
                                        <option>Putty</option>
                                        <option>Plaster</option>
                                        <option>No Finish</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Board Type *</label>
                                    <select id="tipo_plancha" class="form-select">
                                        <option>Sheetrock</option>
                                        <option>Densglass</option>
                                        <option>Durock</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Tape *</label>
                                    <select id="tipo_cinta" class="form-select">
                                        <option>Paper</option>
                                        <option>Mesh</option>
                                    </select>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end gap-3 mb-3">
                                <input type="reset" id='resetBtn' value="Reset" class="btn btn-alt-secondary">
                                <button id="copyBtn" type="button" class="btn btn-alt-primary">Copy</button>
                            </div>
                        </form>

                        <div id="materials" class="mb-5">
                            <div class="p-5 bg-light rounded mb-5">
                                <h3 class="fw-bold mb-2 text-primary text-sm">MATERIALS</h3>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">UNIT SLEEPERS</label>
                                        <div id="d_und" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">UNIT SECTIONS</label>
                                        <div id="p_und_secciones" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">UNIT PARALLELS</label>
                                        <div id="p_und" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">UNIT SHEETS</label>
                                        <div id="pl_und" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">GALLON PER 4
                                            SHEETS</label>
                                        <div id="m_galon_4_planchas" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">BUCKETS OF PUTTY ONE
                                            SIDE</label>
                                        <div id="m_cubeta_4_planchas" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">SHEET SCREWS
                                            (POUND)</label>
                                        <div id="to_tornillos_plancha"
                                            class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">STRUCTURE SCREWS</label>
                                        <div id="to_tornillos_estructura"
                                            class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">PIN NAILS</label>
                                        <div id="to_clavos_pin" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">DETONATORS</label>
                                        <div id="to_fulminantes" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-uppercase text-secondary fw-semibold">UNIT TAPE 250</label>
                                        <div id="cinta" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-5 bg-light rounded mb-5">
                                <h3 class="fw-bold mb-2 text-primary text-sm">LABOR</h3>
                                <div class="row g-3 mb-5">
                                    <div class="col-md-4">
                                        <label class="text-uppercase text-secondary fw-semibold">Labor Fascia 3
                                            Sides</label>
                                        <div id="mano_obra_3" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-uppercase text-secondary fw-semibold">Labor Fascia 5
                                            Sides</label>
                                        <div id="mano_obra_5" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-uppercase text-secondary fw-semibold">Labor Fascia 2
                                            Sides</label>
                                        <div id="mano_obra_2" class="border p-2 text-center bg-white fw-semibold">
                                            0.00
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        let v = {};

        function calcular() {
            v.largo = parseFloat($('#largo').val());
            v.ancho = parseFloat($('#ancho').val());
            v.base = {
                a: parseFloat($('#a').val()),
                b: parseFloat($('#b').val()),
                c: parseFloat($('#c').val()),
                d: parseFloat($('#d').val()),
            }
            v.perimetro_ml = (v.largo + v.ancho) * 2;
            v.m2 = (v.largo * v.ancho);
            v.durmientes_ml = v.perimetro_ml;
            v.durmientes_und = (v.perimetro_ml * 3) / 3.05;
            v.durmientes_und_cal1 = (v.durmientes_und * 0.05) + v.durmientes_und;

            v.parales_secciones = v.perimetro_ml / 0.61;
            v.parales = (v.base.a + v.base.d) * v.parales_secciones / 3.05;

            v.m2_facias = v.perimetro_ml * (v.base.a + v.base.b + v.base.c + v.base.d);
            v.planchas_m2_facias = v.m2_facias;
            v.planchas = v.planchas_m2_facias / 2.97;

            v.esquineros_ml = v.perimetro_ml;
            v.esquineros = (v.esquineros_ml * 2) / 3.05;
            v.esquineros_calc1 = (v.esquineros * 0.05) + v.esquineros;

            v.mano_obra_facia_3caras = v.perimetro_ml * 3;
            v.mano_obra_facia_5caras = v.perimetro_ml * 5;
            v.mano_obra_facia_2caras = v.perimetro_ml * 2;

            v.masilla_galones = v.planchas / 4;
            v.masilla_cubetas = v.masilla_galones / 5;

            v.tornillos_plancha = v.planchas * 30 / 270;
            v.tornillo_estructura = v.parales_secciones * 10 / 430;
            v.clavos_pin = 3 * v.parales_secciones / 100;
            v.fulminantes = v.clavos_pin;
            v.cinta = v.planchas * 8.75 / 250;

            $('#perimetro_ml').text(v.perimetro_ml.toFixed(2));
            $('#m2').text(v.m2.toFixed(2));
            $('#d_ml').text(v.durmientes_ml.toFixed(2));
            $('#d_und').text(Math.round(v.durmientes_und_cal1).toFixed(2));
            $('#p_und_secciones').text(v.parales_secciones.toFixed(2));
            $('#p_und').text(v.parales.toFixed(2));
            $('#pl_m2').text(v.m2_facias.toFixed(2));
            $('#pl_und').text(v.planchas.toFixed(2));
            $('#m_galon_4_planchas').text(v.masilla_galones.toFixed(2));
            $('#m_cubeta_4_planchas').text(v.masilla_cubetas.toFixed(2));
            $('#to_tornillos_plancha').text(Math.ceil(v.tornillos_plancha));
            $('#to_tornillos_estructura').text(v.tornillo_estructura.toFixed(2));
            $('#to_clavos_pin').text(v.clavos_pin.toFixed(2));
            $('#to_fulminantes').text(v.fulminantes.toFixed(2));
            $('#cinta').text(v.cinta.toFixed(2));
            $('#mano_obra_3').text(v.mano_obra_facia_3caras.toFixed(2));
            $('#mano_obra_5').text(v.mano_obra_facia_5caras.toFixed(2));
            $('#mano_obra_2').text(v.mano_obra_facia_2caras.toFixed(2));
            $('#m2_facia').text(v.m2_facias.toFixed(2));
        }

        $(document).ready(function() {
            calcular();
        });

        $('input').keyup(function(e) {
            calcular();
        });

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
    </script>
@endpush
