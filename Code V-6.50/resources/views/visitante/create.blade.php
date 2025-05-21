@extends('layouts.admin')

@section('template_title')
    | Nuevo visitante
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                        
                    <div class="text-center">
                        <img src="{{asset('svg/undraw_complete-form_aarh.svg')}}" alt="Icon" style="width: 30%;padding-top: 20px;">
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('visitante.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('visitante.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
