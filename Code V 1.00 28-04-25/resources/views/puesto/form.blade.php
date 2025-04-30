<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_puesto" class="form-label">{{ __('Id Puesto') }}</label>
            <input type="text" name="id_puesto" class="form-control @error('id_puesto') is-invalid @enderror" value="{{ old('id_puesto', $puesto?->id_puesto) }}" id="id_puesto" placeholder="Id Puesto">
            {!! $errors->first('id_puesto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="puesto" class="form-label">{{ __('Puesto') }}</label>
            <input type="text" name="puesto" class="form-control @error('puesto') is-invalid @enderror" value="{{ old('puesto', $puesto?->puesto) }}" id="puesto" placeholder="Puesto">
            {!! $errors->first('puesto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>