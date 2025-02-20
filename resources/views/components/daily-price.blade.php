@php

    $dailyPrice = \App\Models\DailyPrice::first();
@endphp

<div class="content content-boxed content-full overflow-hidden" style="margin-bottom: -66px">
    <div class="block block-rounded">
        <div class="block-content">
            @php
                $disabled = true;
            @endphp
            @auth
                @role('admin')
                    @php
                        $disabled = false;
                    @endphp
                    <form action="{{ route('admin.daily-price.update', $dailyPrice->id) }}"
                        method="POST">
                        @csrf
                    @endrole
                @endauth


                <div class="row d-flex justify-content-between text-center mt-4 mb-4">

                    <h4>{{ __('PRECIOS DE SHEETROCK AL DIA HOY (REP. DOMINICANA)') }}</h4>
                    <div class="col-md-3">
                        <div class="fw-bold">PRECIO <br> M.O. / M²*</div>
                        <input type="text" name="precio" required
                            value="{{ $dailyPrice->precio }}"
                           {{ $disabled ? 'disabled' : '' }}
                            class="form-control input-box mx-auto fw-bold">
                    </div>
                    <div class="col-md-3">
                        <div class="fw-bold">PRECIO MATERIALES <br> / M²*</div>
                        <input type="text" name="precio_materiales"
                         {{ $disabled ? 'disabled' : '' }}
                            value="{{ $dailyPrice->precio_materiales }}"
                            class="form-control input-box mx-auto fw-bold">
                    </div>
                    <div class="col-md-3">
                        <div class="fw-bold">PRECIO TODO COSTO <br> / M²*</div>
                        <input type="text" name="precio_todo"
                         {{ $disabled ? 'disabled' : '' }}
                            value="{{ $dailyPrice->precio_todo }}"
                            class="form-control input-box mx-auto fw-bold">
                    </div>
                </div>

                {{-- submit button --}}
                @auth
                    @role('admin')
                        <div class="row d-flex">
                            <div class="col-md-12 mb-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                @endrole
            @endauth

            <p class="alert alert-secondary p-3 text-xs mb-5">
                {{ __('Esta herramienta ha sido diseñada para brindar un cálculo aproximado, teniendo en cuenta ciertos parámetros estándar. Sin embargo, es importante tener en cuenta que cada instalación puede                                                                                                         presentar particularidades que no se consideran en este cálculo general.') }}
            </p>

        </div>
    </div>
</div>
