<dov class="row">
    <div class="col-md-12">

        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-2"> 
                <label for="nombre" class="form-label">{{ __('Nombre') }}</label><b>*</b>
            </div>
            
            <div class="col-md-10">
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $visitante?->nombre) }}" id="nombre" placeholder="Nombre" required autocomplete="off">
                {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-2"> 
                <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label><b>*</b>
            </div>
            
            <div class="col-md-10">
                <input type="text" name="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno', $visitante?->apellido_paterno) }}" id="apellido_paterno" placeholder="Apellido Paterno" required autocomplete="off">
                {!! $errors->first('apellido_paterno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-2"> 
                <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }}</label>
            </div>
            
            <div class="col-md-10">
                <input type="text" name="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno', $visitante?->apellido_materno) }}" id="apellido_materno" placeholder="Apellido Materno" autocomplete="off">
                {!! $errors->first('apellido_materno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-2"> 
                <label for="menor" class="form-label">Acompañante menor<b>*</b></label>
            </div>
            
            <div class="col-md-10">
                <select name="menor" id="menor" class="form-control" required>
                    <option value="Solo" {{old('menor') == 'Solo' ? 'selected' : ''}}>Solo</option>
                    <option value="Menor" {{old('menor') == 'Menor' ? 'selected' : ''}}>Menor</option>
                </select> 
                {!! $errors->first('menor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-2"> 
                <label for="motivo" class="form-label">Motivo</label><b>*</b>
            </div>
            
            <div class="col-md-10">
                <input type="text" name="motivo" class="form-control @error('motivo') is-invalid @enderror" value="{{ old('motivo', $visitante?->motivo) }}" id="motivo" placeholder="Motivo" required autocomplete="off">
                {!! $errors->first('motivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-2"> 
                <label for="numIdenFile" class="form-label">Número de identificador</label>
            </div>
            
            <div class="col-md-10">
                <input type="number" name="numIdenFile" class="form-control @error('numIdenFile') is-invalid @enderror" value="{{ old('numIdenFile', $visitante?->numIdenFile) }}" id="numIdenFile" placeholder="Identificador númeroco" autocomplete="off">
                {!! $errors->first('numIdenFile', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
            <div class="col-md-2"> 
                <label for="identificacion" class="form-label">Archivo de Identificación</label>
            </div>
            
            <div class="col-md-10">
                <input type="file" id="file" name="file" class="form-control" accept="image/png, image/jpeg">
                <br>
                <center><output id="list"></output></center>
                <script>
                    function archivo(evt){
                        var files = evt.target.files;
                        //obtenemos la imagen del campo "file".
                        for (var i=0, f; f = files[i]; i++){
                            //solo admitimos imagenes.
                            if (!f.type.match('image.*')){
                                continue;
                            }
                            var reader = new FileReader();
                            reader.onload = (function (theFile){
                                return function (e){
                                    //insertamos la imagen
                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result,'"width="30%" title="', escape(theFile.name),'"/>'].join('');
                                };
                            }) (f);
                            reader.readAsDataURL(f);
                        }

                    }
                    document.getElementById('file').addEventListener('change',archivo, false);
                </script>  
            </div>
        </div>


                
        <div class="row mb-0">
            <div class="col-md-12 offset-md-4">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>

    </div>
</dov>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menorSelect = document.getElementById('menor');
        const motivoInput = document.getElementById('motivo');
    
        const nombreInput = document.getElementById('nombre');
        const apellidoPaternoInput = document.getElementById('apellido_paterno');
        const apellidoMaternoInput = document.getElementById('apellido_materno');
    
        function actualizarMotivo() {
            const menorValor = menorSelect.value;
            const nombre = nombreInput.value.trim();
            const apellidoPaterno = apellidoPaternoInput.value.trim();
            const apellidoMaterno = apellidoMaternoInput.value.trim();
    
            if (menorValor === 'Menor' && nombre && apellidoPaterno && apellidoMaterno) {
                motivoInput.value = `${nombre} ${apellidoPaterno} ${apellidoMaterno} está ingresando con un menor de edad.`;
            }
        }
    
        menorSelect.addEventListener('change', actualizarMotivo);
    
        // Opcional: también puedes actualizar el motivo si cambian los nombres
        nombreInput.addEventListener('input', actualizarMotivo);
        apellidoPaternoInput.addEventListener('input', actualizarMotivo);
        apellidoMaternoInput.addEventListener('input', actualizarMotivo);
    });
    </script>
    