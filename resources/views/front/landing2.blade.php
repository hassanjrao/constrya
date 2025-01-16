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
                            Sheet Rock
                        </h1>
                    </div>
                    <div class="block-content block-content-full space-y-3">
                        <form class="sheetRockForm" autocomplete="off" method="POST"
                            action="{{ route('sheet-rock.calculate') }}">
                            @csrf
                            <div class="mb-3">
                                <div class="row align-items-end">
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <label for="metros_lineares" class="form-label">{{ __('Linear meters *') }}</label>
                                        <input type="number" step="any" min="0" placeholder="0" required
                                            name="metros_lineares" id="metros_lineares" class="form-control">
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                        <label for="height" class="form-label">Height *</label>
                                        <input type="number" step="any" min="0" placeholder="0" required
                                            name="height" id="height" class="form-control">
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center mb-3">
                                        <div id="m2" class="border p-2 me-2 text-center"></div>
                                        <span class="fw-bold">M2</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sides" value="1"
                                                required id="side1">
                                            <label class="form-check-label" for="side1">1 Side</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sides" value="2"
                                                required id="side2" checked>
                                            <label class="form-check-label" for="side2">2 Sides</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-lg-3 col-sm-6">
                                    <label for="profile" class="form-label">Metal profiles @ 60cm *</label>
                                    <select name="profile" id="profile" class="form-select">
                                        <option>2 1/2 cal .25</option>
                                        <option>2 1/2 cal .22</option>
                                        <option>1 5/8 cal .25</option>
                                        <option>1 5/8 cal .22</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <label for="finish" class="form-label">Finish *</label>
                                    <select name="finish" id="finish" class="form-select">
                                        <option>Putty</option>
                                        <option>Plaster</option>
                                        <option>Without finish</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <label for="board_type" class="form-label">Type of board *</label>
                                    <select name="board_type" id="board_type" class="form-select">
                                        <option>Sheetrock</option>
                                        <option>Densglass</option>
                                        <option>Durock</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <label for="tape" class="form-label">Tape *</label>
                                    <select name="tape" id="tape" class="form-select">
                                        <option>Paper</option>
                                        <option>Mesh</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 mb-3">
                                    <label for="doors" class="form-label">Doors (Units) *</label>
                                    <input type="number" value="0" required min="0" placeholder="0"
                                        name="doors" id="doors" class="form-control">
                                    <p class="text-danger small fw-bold">(2.10 x 0.90)</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="corners" class="form-label">Corners *</label>
                                    <input type="number" value="0" required min="0" placeholder="0"
                                        name="corners" id="corners" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="corner_pieces" class="form-label">Corner pieces *</label>
                                    <select name="corner_pieces" id="corner_pieces" class="form-select">
                                        <option>Metal</option>
                                        <option>Plastic</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="interior_exterior"
                                            value="interior" id="interior" required checked>
                                        <label class="form-check-label" for="interior">Interior</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="interior_exterior"
                                            value="exterior" id="exterior" required>
                                        <label class="form-check-label" for="exterior">Exterior</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-3 mb-3">
                                <input type="submit" value="Calculate" id="calculate" class="btn btn-alt-success">
                                <input type="reset" value="Reset" class="btn btn-alt-secondary">
                                <button id="copiar" class="btn btn-alt-primary">Copy</button>
                            </div>

                            <p class="alert alert-warning fw-semibold text-xs">The boards corresponding to the holes for
                                the doors (1.89 m2 per door) are not being subtracted.</p>

                            <div>
                                <h3 class="fw-semibold text-sm mb-1">
                                    Materials
                                </h3>
                                <div class="border p-3">
                                    <div class="row g-3">
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Sleepers
                                            </span>
                                            <div id="sleepers"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Screws
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
                                                    Wood reinforcement
                                                    <p class="text-xs text-danger fw-bold">( 1"x 2"x 8')</p>
                                                </span>
                                                <div id="wood_reinforcement"
                                                    class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Studs
                                            </span>
                                            <div id="studs"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Structural screws
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
                                                Panels
                                            </span>
                                            <div id="panels"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Nails
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
                                                Putty - bucket
                                            </span>
                                            <div id="putty_bucket"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Tapes
                                            </span>
                                            <div id="tapes"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Fasteners
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
                                                Corner beads
                                            </span>
                                            <div id="corner_beads"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 d-flex align-items-center">
                                            <span class="fw-bold text-xs text-capitalize">
                                                Cement
                                            </span>
                                            <div id="cement"
                                                class="border p-2 ms-2 text-center text-sm fw-semibold reset">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Section #2 -->
@endsection

@push('scripts')
    <script>
        const calculateBtn=$('#calculate');
        // add form submit event
        $('.sheetRockForm').submit(function(e) {
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




                    calculateBtn.prop('disabled', false);

                },
                error: function(response) {
                    console.log('error', response);

                    calculateBtn.prop('disabled', false);
                }
            });
        });
    </script>
@endpush
