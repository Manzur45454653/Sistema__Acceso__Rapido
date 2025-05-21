@extends('layouts.admin')

@section('template_title')
    | Información visitante
@endsection

@section('content')

    <div class="content" style="margin-left: 20px">
        {{-- Solo se muestre la alerta cuando existe un error MANERA 2--}}
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{$error}}</li>
            </div>
        @endforeach

        <br>
        
        <dov class="row">
            <div class="col-md-12">

                <div class="card card-outline card-success">
                    
                    <div class="card-header">
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{url('visitante')}}">Lista de visitantes</a>
                        </div>

                        <div class="text-center" style="padding-bottom: 30px;">
                            <img src="{{asset('svg/undraw_profile-details_6fky.svg')}}" alt="Icon S.A.R."style="width: 20%; padding-top:25px">
                        </div>                            
                    </div><!-- /.card-header -->

                    <div class="card-body" style=""><!-- card-body -->
                        
                        <div class="form-group mb-2 mb20 text-center">
                            <a class="btn btn-success btn-sm" href="{{ route('visitante.pdf', $visitante->id) }}" target="_blank">
                                <i class="bi bi-filetype-pdf" style="font-size: 50px"></i>
                            </a>
                        </div>

                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                            <div class="col-md-2"> <strong>Nombre:</strong> </div>
                            <div class="col-md-10"> {{ $visitante->nombre." ".$visitante->apellido_materno." ". $visitante->apellido_paterno }} </div>
                        </div>
                        
                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                            <div class="col-md-2"> <strong>Motivo:</strong> </div>
                            <div class="col-md-10"> {{ $visitante->motivo }} </div>
                        </div>
                        
                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                            
                            <div class="col-md-2"> <strong>Identificacion:</strong> </div>
                            <div class="col-md-10">
                                @if ($visitante->identificacion != '')
                                        <img src="{{asset('storage').'/'.$visitante->identificacion}}" alt="Fotografia" width="150px" style="margin-left: 250px;">
                                @endif

                                @if ($visitante->numIdenFile != '')
                                    {{ $visitante->numIdenFile }}
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                            <div class="col-md-2"> <strong>Código Qr:</strong> </div>
                            <div class="col-md-10">
                                <img src="{{asset('storage').'/'.$visitante->code_qr}}" alt="Fotografia" width="150px" style="margin-left: 250px;">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <a href="{{url('plantele')}}" class="btn btn-info" style="margin-top: 25px;">Cancelar</a>
                            </div>
                        </div>
                        
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
        </dov>

    </div>

@endsection
