@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 30px;">
        <div class="col-md-8">
            <div class="card" style="border: hidden;">
                <div class="card-header text-center" style="background-color: #f7f7f7; --bs-card-border-color: hidden;">
                    <img src="{{asset('svg/undraw_login_weas.svg')}}" alt="Icon S.A.R."style="width: 20%">
                    <h1 style="color: #23b0ff; padding-top: 3%; font-family: sans-serif;"> S. A. R.</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="font-weight: 600; font-size:16px">Correo electronico:</label>

                            <div class="col-md-6 input-data">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Campo obligatorio.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="font-weight: 600; font-size:16px">Contraseña</label>

                            <div class="col-md-6 input-data">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Campo obligatorio.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #23b0ff; border-color:#23b0ff;">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
