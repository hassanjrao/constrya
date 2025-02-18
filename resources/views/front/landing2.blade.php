@extends('layouts.simple')
@section('page-title', __('Sheet Rock'))

@section('content')
    <!-- Section #2 -->
    <div class="content content-boxed content-full overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h1 class="">
                            {{ __('Sheet Rock') }}
                        </h1>
                    </div>
                    <div class="block-content block-content-full space-y-3">
                        <form class="sheetRockForm mb-5" id="sheetRockForm" autocomplete="off" method="POST"
                            action="{{ route('sheet-rock.calculate') }}">
                            @csrf
                            <div class="mb-3">
                                <div class="row align-items-end">
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <label for="metros_lineares"
                                            class="form-label">{{ __('Metros lineales *') }}</label>
                                        <input type="number" step="any" min="0" placeholder="0" required
                                            name="metros_lineares" id="metros_lineares" class="form-control">
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <label for="height" class="form-label">{{ __('Altura *') }}</label>
                                        <input type="number" step="any" min="0" placeholder="0" required
                                            name="height" id="height" class="form-control">
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center mb-3">
                                        <div id="m2" class="border p-2 me-2 text-center"></div>
                                        <span class="fw-bold">{{ __('M2') }}</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sides" value="1"
                                                required id="side1">
                                            <label class="form-check-label" for="side1">{{ __('1 Lado') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sides" value="2"
                                                required id="side2" checked>
                                            <label class="form-check-label" for="side2">{{ __('2 Lados') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-lg-3 col-sm-6">
                                    <label for="profile" class="form-label">{{ __('Perfiles metálicos a 60cm *') }}</label>
                                    <select name="profile" id="profile" class="form-select">
                                        <option>2 1/2 cal .25</option>
                                        <option>2 1/2 cal .22</option>
                                        <option>1 5/8 cal .25</option>
                                        <option>1 5/8 cal .22</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <label for="finish" class="form-label">{{ __('Acabado *') }}</label>
                                    <select name="finish" id="finish" class="form-select">
                                        <option>Masilla</option>
                                        <option>Yeso</option>
                                        <option>Sin acabado</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <label for="board_type" class="form-label">{{ __('Tipo de plancha *') }}</label>
                                    <select name="board_type" id="board_type" class="form-select">
                                        <option>Sheetrock</option>
                                        <option>Densglass</option>
                                        <option>Durock</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <label for="tape" class="form-label">{{ __('Cinta *') }}</label>
                                    <select name="tape" id="tape" class="form-select">
                                        <option>Papel</option>
                                        <option>Malla</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 mb-3">
                                    <label for="doors" class="form-label">{{ __('Puertas (Unidades) *') }}</label>
                                    <input type="number" value="0" required min="0" placeholder="0"
                                        name="doors" id="doors" class="form-control">
                                    <p class="text-danger small fw-bold">(2.10 x 0.90)</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="corners" class="form-label">{{ __('Esquinas *') }}</label>
                                    <input type="number" value="0" required min="0" placeholder="0"
                                        name="corners" id="corners" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="corner_pieces" class="form-label">{{ __('Piezas de esquina *') }}</label>
                                    <select name="corner_pieces" id="corner_pieces" class="form-select">
                                        <option>Metal</option>
                                        <option>Plástico</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="interior_exterior"
                                            value="interior" id="interior" required checked>
                                        <label class="form-check-label" for="interior">{{ __('Interior') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="interior_exterior"
                                            value="exterior" id="exterior" required>
                                        <label class="form-check-label" for="exterior">{{ __('Exterior') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-3 mb-3">
                                <input type="submit" value="{{ __('Calcular') }}" id="calculate"
                                    class="btn btn-alt-success">
                                <input type="button" id='resetBtn' value="{{ __('Reiniciar') }}"
                                    class="btn btn-alt-secondary">
                                <button id="copyBtn" onclick="copyResults()"
                                    class="btn btn-alt-primary">{{ __('Copiar') }}</button>
                            </div>

                            <div class="d-flex justify-content-end gap-3 mb-3">

                                @if (userSubscribed())
                                    <div class="d-flex justify-content-end gap-3 mt-3">
                                        <button id="providerBtn" onclick="sendToProviders()" class="btn btn-alt-primary">
                                            {{ __('Enviar a Proveedores') }}
                                        </button>
                                        <button id="automaticQuoteBtn" onclick="automaticQuote()"
                                            class="btn btn-alt-info">
                                            {{ __('Cotización automática') }}
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <p class="alert alert-warning fw-semibold text-xs">
                                {{ __('Las planchas correspondientes a los huecos de las puertas (1.89 m2 por puerta) no se están restando.') }}
                            </p>



                            <div>
                                <h3 class="fw-semibold text-sm mb-1">
                                    {{ __('Materiales') }}
                                </h3>
                                <div class="border p-3">
                                    <div class="row g-3">
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Durmientes') }}
                                            </span>
                                            <div id="sleepers"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Tornillos') }}
                                            </span>
                                            <div id="screws"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                            <span class="fw-bold ms-2 text-xs">
                                                (lb)
                                            </span>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold text-xs text-capitalize me-2">
                                                    {{ __('Refuerzo de madera') }}
                                                    <p class="text-xs text-danger fw-bold">( 1"x 2"x 8')</p>
                                                </span>
                                                <div id="wood_reinforcement"
                                                    class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Montantes') }}
                                            </span>
                                            <div id="studs"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Tornillos estructurales') }}
                                            </span>
                                            <div id="structural_screws"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                            <span class="fw-bold ms-2 text-xs">
                                                (lb)
                                            </span>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Paneles') }}
                                            </span>
                                            <div id="panels"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Clavos') }}
                                            </span>
                                            <div id="nails"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                            <span class="fw-bold ms-2 text-xs">
                                                (Uds.)
                                            </span>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Masilla - Cubeta') }}
                                            </span>
                                            <div id="putty_bucket"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Cintas') }}
                                            </span>
                                            <div id="tapes"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Sujetadores') }}
                                            </span>
                                            <div id="fasteners"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                            <span class="fw-bold ms-2 text-xs">
                                                (Uds.)
                                            </span>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Cantoneras') }}
                                            </span>
                                            <div id="corner_beads"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                {{ __('Cemento') }}
                                            </span>
                                            <div id="cement"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        const calculateBtn = $('#calculate');
        const copyBtn = $('#copyBtn');
        const resetBtn = $('#resetBtn');
        const providerBtn = $('#providerBtn');
        const automaticQuoteBtn = $('#automaticQuoteBtn');


        providerBtn.prop('disabled', true);
        automaticQuoteBtn.prop('disabled', true);

        // disable copy button and reset button
        // copyBtn.prop('disabled', true);
        // resetBtn.prop('disabled', true);

        // add form submit event
        $('#sheetRockForm').submit(function(e) {
            e.preventDefault();
            var form = $(this);



            calculateBtn.prop('disabled', true);

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    console.log('success', response);

                    $('#m2').text(response.m2box);
                    $('#sleepers').text(response.sleepers);
                    $('#screws').text(response.screws);
                    $('#wood_reinforcement').text(response.wood_reinforcement);
                    $('#studs').text(response.studs);
                    $('#structural_screws').text(response.structural_screws);
                    $('#panels').text(response.panels);
                    $('#nails').text(response.nails);
                    $('#putty_bucket').text(response.putty);
                    $('#tapes').text(response.tapes);
                    $('#fasteners').text(response.fasteners);
                    $('#corner_beads').text(response.corner_beads);
                    $('#cement').text(response.cement);


                    if (response.calculationId) {
                        // create hidden input for calculation id
                        let input =
                            `<input type="hidden" name="calculation_id" id="calculation_id" value="${response.calculationId}">`;

                        form.append(input);

                        providerBtn.prop('disabled', false);
                        automaticQuoteBtn.prop('disabled', false);
                    }


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

        function copyResults() {
            let profile = $('#profile').val();
            let finish = $('#finish').val();
            let board_type = $('#board_type').val();
            let tape = $('#tape').val();
            let corner_type = $('#corner_pieces').val();
            let sleepers = $('#sleepers').text();
            let screws = $('#screws').text();
            let wood_reinforcement = $('#wood_reinforcement').text();
            let studs = $('#studs').text();
            let structural_screws = $('#structural_screws').text();
            let panels = $('#panels').text();
            let nails = $('#nails').text();
            let putty_bucket = $('#putty_bucket').text();
            let tapes = $('#tapes').text();
            let fasteners = $('#fasteners').text();
            let corner_beads = $('#corner_beads').text();
            let cement = $('#cement').text();


            let text =
                `Profile: ${profile}\nFinish: ${finish}\nBoard Type: ${board_type}\nTape: ${tape}\nCorner Type: ${corner_type}\nSleepers: ${sleepers}\nScrews: ${screws}\nWood Reinforcement: ${wood_reinforcement}\nStuds: ${studs}\nStructural Screws: ${structural_screws}\nPanels: ${panels}\nNails: ${nails}\nPutty Bucket: ${putty_bucket}\nTapes: ${tapes}\nFasteners: ${fasteners}\nCorner Beads: ${corner_beads}\nCement: ${cement}`;

            navigator.clipboard.writeText(text).then(function() {
                alertSuccess("{!! __('Copiado al portapapeles') !!}");
            }, function(err) {
                alertError('Async: Could not copy text: ', err);
            });
        }

        function sendToProviders() {

            providerBtn.prop('disabled', true);

            $.ajax({
                url: "{{ route('user.send-to-providers.sheet-rock') }}",
                type: 'POST',
                data: $('#sheetRockForm').serialize(),
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
                window.open("{{ route('user.automatic-quote.sheet-rock') }}?calculation_id=" + calculationId, '_blank');
            } else {
                alertError("{!! __('Primero calcule los materiales') !!}");
            }

        }

        function setDefaultValues() {

            $('#m2').text(0.00);
            $('#sleepers').text(0.00);
            $('#screws').text(0.00);
            $('#wood_reinforcement').text(0.00);
            $('#studs').text(0.00);
            $('#structural_screws').text(0.00);
            $('#panels').text(0.00);
            $('#nails').text(0.00);
            $('#putty_bucket').text(0.00);
            $('#tapes').text(0.00);
            $('#fasteners').text(0.00);
            $('#corner_beads').text(0.00);
            $('#cement').text(0.00);
        }

        $('#resetBtn').click(function() {
            // reset form
            $('#sheetRockForm').trigger('reset');
            setDefaultValues();
        });

        setDefaultValues();
    </script>
@endpush
