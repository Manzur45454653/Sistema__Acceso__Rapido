<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $visitante?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }}</label>
            <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno', $visitante?->apellido_materno) }}" id="apellido_materno" placeholder="Apellido Materno">
            {!! $errors->first('apellido_materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label>
            <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno', $visitante?->apellido_paterno) }}" id="apellido_paterno" placeholder="Apellido Paterno">
            {!! $errors->first('apellido_paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="motivo" class="form-label">{{ __('Motivo') }}</label>
            <input type="text" name="motivo" class="form-control @error('motivo') is-invalid @enderror" value="{{ old('motivo', $visitante?->motivo) }}" id="motivo" placeholder="Motivo">
            {!! $errors->first('motivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="genero" class="form-label">{{ __('Genero') }}</label>
            <input type="text" name="genero" class="form-control @error('genero') is-invalid @enderror" value="{{ old('genero', $visitante?->genero) }}" id="genero" placeholder="Genero">
            {!! $errors->first('genero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="menor" class="form-label">{{ __('Menor') }}</label>
            <input type="text" name="menor" class="form-control @error('menor') is-invalid @enderror" value="{{ old('menor', $visitante?->menor) }}" id="menor" placeholder="Menor">
            {!! $errors->first('menor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="identificacion" class="form-label">{{ __('Identificacion') }}</label>
            <input type="text" name="identificacion" class="form-control @error('identificacion') is-invalid @enderror" value="{{ old('identificacion', $visitante?->identificacion) }}" id="identificacion" placeholder="Identificacion">
            {!! $errors->first('identificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="code_qr" class="form-label">{{ __('Code Qr') }}</label>
            <input type="text" name="code_qr" class="form-control @error('code_qr') is-invalid @enderror" value="{{ old('code_qr', $visitante?->code_qr) }}" id="code_qr" placeholder="Code Qr">
            {!! $errors->first('code_qr', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reactivacion" class="form-label">{{ __('Reactivacion') }}</label>
            <input type="text" name="reactivacion" class="form-control @error('reactivacion') is-invalid @enderror" value="{{ old('reactivacion', $visitante?->reactivacion) }}" id="reactivacion" placeholder="Reactivacion">
            {!! $errors->first('reactivacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fechas_impresion" class="form-label">{{ __('Fechas Impresion') }}</label>
            <input type="text" name="fechas_impresion" class="form-control @error('fechas_impresion') is-invalid @enderror" value="{{ old('fechas_impresion', $visitante?->fechas_impresion) }}" id="fechas_impresion" placeholder="Fechas Impresion">
            {!! $errors->first('fechas_impresion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>