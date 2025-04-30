@extends('layouts.app')

@section('template_title')
    {{ $visitante->name ?? __('Show') . " " . __('Visitante') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Visitante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('visitantes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $visitante->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Materno:</strong>
                                    {{ $visitante->apellido_materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Paterno:</strong>
                                    {{ $visitante->apellido_paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Motivo:</strong>
                                    {{ $visitante->motivo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $visitante->genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Menor:</strong>
                                    {{ $visitante->menor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Identificacion:</strong>
                                    {{ $visitante->identificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code Qr:</strong>
                                    {{ $visitante->code_qr }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Reactivacion:</strong>
                                    {{ $visitante->reactivacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechas Impresion:</strong>
                                    {{ $visitante->fechas_impresion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
