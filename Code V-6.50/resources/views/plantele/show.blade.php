@extends('layouts.admin')

@section('template_title')
    | Información Plantel
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
                        <div class="text-center">
                            <img src="{{asset('svg/undraw_sweet-home_ezw3.svg')}}" alt="Icon S.A.R." style="width: 25%; padding-top: 20px;">
                        </div>
                    </div><!-- /.card-header -->

                    <div class="card-body" style="">
                        
                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                            <div class="col-md-2"> <strong>Plantel:</strong> </div>
                            <div class="col-md-10"> {{ $plantele->plantel }} </div>
                        </div>
                        
                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:20px;">
                            <div class="col-md-2"> <strong>Direccion:</strong> </div>
                            <div class="col-md-10"> {{ $plantele->direccion }} </div>
                        </div>
                        
                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                            <div class="col-md-2"> <strong>Correo:</strong> </div>
                            <div class="col-md-10"> {{ $plantele->correo }} </div>
                        </div>
                        
                        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:20px;">
                            <div class="col-md-2"> <strong>Telefono:</strong> </div>
                            <div class="col-md-10"> {{ $plantele->telefono }} </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{url('plantele')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                        
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
        </dov>

    </div>
@endsection
