@extends('layouts.app')

@section('template_title')
    {{ $plantele->name ?? __('Show') . " " . __('Plantele') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Plantele</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('planteles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Plantel:</strong>
                                    {{ $plantele->id_plantel }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Plantel:</strong>
                                    {{ $plantele->plantel }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $plantele->direccion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
