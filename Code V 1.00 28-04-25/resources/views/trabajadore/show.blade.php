@extends('layouts.app')

@section('template_title')
    {{ $trabajadore->name ?? __('Show') . " " . __('Trabajadore') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Trabajadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('trabajadores.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $trabajadore->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Materno:</strong>
                                    {{ $trabajadore->apellido_materno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido Paterno:</strong>
                                    {{ $trabajadore->apellido_paterno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Genero:</strong>
                                    {{ $trabajadore->genero }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Plantel:</strong>
                                    {{ $trabajadore->id_plantel }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Puesto:</strong>
                                    {{ $trabajadore->id_puesto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $trabajadore->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fotografia:</strong>
                                    {{ $trabajadore->fotografia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Code Qr:</strong>
                                    {{ $trabajadore->code_qr }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
