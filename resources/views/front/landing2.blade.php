@extends('layouts.simple')
@section('page-title',__('Sheet Rock'))

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

                            <form class="ajaxform2" action="main/calcular" autocomplete="off">
                                <div class="mb-3">
                                    <div class="row align-items-end">
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                            <label for="metros_lineares" class="form-label">Metros lineales *</label>
                                            <input type="number" step="any" min="0" placeholder="0" required name="metros_lineares" id="metros_lineares" class="form-control">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                            <label for="altura" class="form-label">Altura *</label>
                                            <input type="number" step="any" min="0" placeholder="0" required name="altura" id="altura" class="form-control">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center mb-3">
                                            <div id="m2" class="border p-2 me-2 text-center"> </div>
                                            <span class="fw-bold">M2</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="OptionButton1" value="1" required id="cara1">
                                                <label class="form-check-label" for="cara1">1 Cara</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="OptionButton1" value="2" required id="cara2" checked>
                                                <label class="form-check-label" for="cara2">2 Caras</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-lg-3 col-sm-6">
                                        <label for="perfiles" class="form-label">Perfiles metálicos @ 60cm *</label>
                                        <select name="ComboBox1" id="perfiles" class="form-select">
                                            <option>2 1/2 cal .25</option>
                                            <option>2 1/2 cal .22</option>
                                            <option>1 5/8 cal .25</option>
                                            <option>1 5/8 cal .22</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <label for="acabado" class="form-label">Acabado *</label>
                                        <select name="ComboBox2" id="acabado" class="form-select">
                                            <option>Masilla</option>
                                            <option>Empañete</option>
                                            <option>Sin terminación</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <label for="tipo_plancha" class="form-label">Tipo de plancha *</label>
                                        <select name="ComboBox3" id="tipo_plancha" class="form-select">
                                            <option>Sheetrock</option>
                                            <option>Densglass</option>
                                            <option>Durock</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <label for="tipo_cinta" class="form-label">Cinta *</label>
                                        <select name="ComboBox5" id="tipo_cinta" class="form-select">
                                            <option>Papel</option>
                                            <option>Malla</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3 mb-3">
                                        <label for="puertas" class="form-label">Puertas (UDS) *</label>
                                        <input type="number" value="0" required min="0" placeholder="0" name="TextBox4" id="puertas" class="form-control">
                                        <p class="text-danger small fw-bold">(2.10 x 0.90)</p>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="esquinas" class="form-label">Esquinas *</label>
                                        <input type="number" value="0" required min="0" placeholder="0" name="TextBox5" id="esquinas" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="tipo_esquineros" class="form-label">Esquineros *</label>
                                        <select name="ComboBox4" id="tipo_esquineros" class="form-select">
                                            <option>Metálico</option>
                                            <option>Plástico</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="OptionButton3" value="Interior" id="interior" required checked>
                                            <label class="form-check-label" for="interior">Interior</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="OptionButton3" value="Exterior" id="exterior" required>
                                            <label class="form-check-label" for="exterior">Exterior</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-3 mb-3">
                                    <input type="submit" value="Calcular" class="btn btn-success">
                                    <input type="reset" value="Reiniciar" class="btn btn-secondary">
                                    <button id="copiar" class="btn btn-primary">Copiar</button>
                                </div>

                                <p class="alert alert-warning fw-semibold text-xs">No se están restando planchas de los huecos correspondientes a las puertas (1.89 m2 por puerta).</p>

                                <div>
                                    <h3 class="fw-semibold mb-3">Materiales</h3>
                                    <div class="border p-3">
                                        <div class="row g-3">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <span class="fw-bold">Durmientes:</span>
                                                <div id="durmientes" class="border p-2 ms-2 text-center"></div>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <span class="fw-bold">Tornillos:</span>
                                                <div id="tornillos" class="border p-2 ms-2 text-center"></div>
                                                <span class="ms-2">(lb)</span>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <span class="fw-bold">Refuerzo madera:</span>
                                                <div id="refuerzo_madera" class="border p-2 ms-2 text-center"></div>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <span class="fw-bold">Parales:</span>
                                                <div id="parales" class="border p-2 ms-2 text-center"></div>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <span class="fw-bold">Tornillos estructura:</span>
                                                <div id="tornillos_estructura" class="border p-2 ms-2 text-center"></div>
                                                <span class="ms-2">(lb)</span>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <span class="fw-bold">Planchas:</span>
                                                <div id="planchas" class="border p-2 ms-2 text-center"></div>
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
