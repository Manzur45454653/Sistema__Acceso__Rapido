<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_plantel" class="form-label">{{ __('Id Plantel') }}</label>
            <input type="text" name="id_plantel" class="form-control @error('id_plantel') is-invalid @enderror" value="{{ old('id_plantel', $plantele?->id_plantel) }}" id="id_plantel" placeholder="Id Plantel">
            {!! $errors->first('id_plantel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="plantel" class="form-label">{{ __('Plantel') }}</label>
            <input type="text" name="plantel" class="form-control @error('plantel') is-invalid @enderror" value="{{ old('plantel', $plantele?->plantel) }}" id="plantel" placeholder="Plantel">
            {!! $errors->first('plantel', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $plantele?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>