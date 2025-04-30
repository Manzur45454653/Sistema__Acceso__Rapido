@extends('layouts.app')

@section('template_title')
    {{ $estudiante->name ?? __('Show') . " " . __('Estudiante') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estudiante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('estudiantes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $estudiante->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Materno:</strong>
                                    {{ $estudiante->apellido_materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Paterno:</strong>
                                    {{ $estudiante->apellido_paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $estudiante->genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Plantel:</strong>
                                    {{ $estudiante->id_plantel }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $estudiante->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fotografia:</strong>
                                    {{ $estudiante->fotografia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code Qr:</strong>
                                    {{ $estudiante->code_qr }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
