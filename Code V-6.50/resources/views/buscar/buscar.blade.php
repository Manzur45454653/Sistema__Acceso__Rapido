@extends('layouts.admin')

@section('template_title')
    | Buscador
@endsection

@section('content')

<div  class="content text-center" style="margin-left: 20px">

        <div class="text-center">
            <img src="{{asset('svg/undraw_mobile-search_macy.svg')}}" alt="Icon S.A.R." style="width: 10%;padding-bottom: 15px;">
        </div>
    
    <form id="formulario-id">

        <dov class="row">
            <div class="col-md-12">
                <label for="identificador" class="form-label">Escanea o escribe ID</label>
            </div>

            <div class="col-md-12">
                <input type="text" name="identificador" id="identificador" autofocus autocomplete="off" placeholder="Esperando...">
            </div>
                
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>  
        </div>
    </form>

    <div class="row container text-center" id="resultado"></div>
    

    <script>

        $(document).ready(function () {
            const $form = $('#formulario-id');
            const $input = $('input[name="identificador"]');
            const $resultado = $('#resultado');
        
            function limpiarResultado() {
                $resultado.fadeOut(3000, function () {
                    $(this).html('').show();
                });
                $input.val('').focus(); // Reinicia input
            }
        
            $form.on('submit', function (e) {
                e.preventDefault();
                const id = $input.val().trim();
        
                if (!id) return;
        
                $resultado.stop(true, true).show().html('Buscando...');
        
                $.ajax({
                    url: "{{ route('buscar.id') }}",
                    method: "POST",
                    data: {
                        identificador: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {

    console.log("Respuesta exitosa:", data);  // <-- Verifica qué datos llegan

                        let html = '';
                        if (data.tipo === 'comunidad') {

                            html += `
                            <div  class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                                <div class='col-md-2'>     
                                    <strong>Nombre:</strong> 
                                </div>
                                <div class='col-md-10'>
                                    ${data.nombre + ' ' + data.apellido_paterno + ' ' + data.apellido_materno}
                                </div>
                            </div>
                            `;

                            html += `
                            <div  class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                                <div class='col-md-2'>     
                                    <strong>Carrera:</strong> 
                                </div>
                                <div class='col-md-10'>
                                    ${data.id_oferta}
                                </div>
                                </div>
                            `;
  
                            html += `
                            <div  class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                                <div class='col-md-2'>     
                                    <strong>Puesto:</strong> 
                                </div>
                                <div class='col-md-10'>
                                    ${data.id_puesto}
                                </div>
                                </div>
                            `;

                            html += `
                            <div  class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                                <div class='col-md-2'>     
                                    <strong>Foto:</strong> 
                                </div>
                                <div class='col-md-10'>
                                    <img src='/storage/${data.fotografia}' width='150'>
                                </div>
                                </div>
                            `;
                            // html += `<strong>Oferta:</strong> ${data.id_oferta}<br>`;
                            // html += `<strong>Puesto:</strong> ${data.id_puesto}<br>`;
                            // html += `<strong>Foto:</strong> <img src="/storage/${data.fotografia}" width="100">`;                            
                      
                        
                        } else if (data.tipo === 'visitante') {

                            html += `
                            <div  class="col-md-12">
                                    <i class='bi bi-person-check-fill' style="color:#33d497; font-size:80px"></i>
                            </div>
                            `;

                            html += `
                            <div  class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                                <div class='col-md-2'>     
                                    <strong>Nombre:</strong> 
                                </div>
                                <div class='col-md-10'>
                                    <div class='col-md-10'>
                                        ${data.nombre}
                                    </div>
                                </div>
                            </div>
                            `;

                            html += `
                            <div  class="col-md-12" style="display: flex; justify-content: space-between; align-items: center; padding-bottom:15px;">
                                <div class='col-md-2'>     
                                    <strong>Motivo:</strong> 
                                </div>
                                    <div class='col-md-10'>
                                        ${data.motivo}
                                    </div>
                                </div>
                            `;

                        }
                        $resultado.html(html);
                        setTimeout(limpiarResultado, 2000);
                    },
                    error: function (xhr) {
                        let html = `
                            <div  class="col-md-12">
                                <i class='bi bi-person-fill-slash' style="color:#e44f60; font-size:80px"></i>
                            </div>
                            <div  class="col-md-12">
                                ${xhr.responseJSON.error}
                            </div>
                        `;
                        
                        $resultado.html(html);
                        setTimeout(limpiarResultado, 2000);
                    }

                });
            });

        });
    </script>


    {{-- <script>
        // Algunos escáneres añaden un "enter" al final. Si es así, puedes escuchar el input + keypress:
        $('#identificador').on('keypress', function(e) {
            if (e.which === 13) { // Enter
                $('#formulario-id').submit();
            }
        });

        // Si no incluye enter, puedes detectar cuando el input tiene exactamente 20 caracteres y autoenviar:
        $('#identificador').on('input', function() {
            if ($(this).val().length === 20) {
                $('#formulario-id').submit();
            }
        });


        $(document).ready(function() {
            $('#formulario-id').on('submit', function(e) {
                e.preventDefault();
                $('#resultado').html('');
                const id = $('input[name="identificador"]').val();

                $.ajax({
                    url: "{{ route('buscar.id') }}",
                    method: "POST",
                    data: {
                        identificador: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let html = '';
                        if (data.tipo === 'comunidad') {
                            html += `<strong>Nombre:</strong> ${data.nombre}<br>`;
                            html += `<strong>Oferta:</strong> ${data.id_oferta}<br>`;
                            html += `<strong>Foto:</strong> <img src="/storage/${data.fotografia}" width="100">`;
                        } else if (data.tipo === 'visitante') {
                            html += `<strong>Nombre:</strong> ${data.nombre}<br>`;
                            html += `<strong>Motivo:</strong> ${data.motivo}<br>`;
                            html += `<strong>Género:</strong> ${data.genero}`;
                        }
                        $('#resultado').html(html);

                        // Borrar después de 10 segundos
                        // setTimeout(() => {
                        //     $('#resultado').fadeOut(500, () => $(this).empty().show());
                        // }, 500);
                        setTimeout(() => {
                            $('#resultado').fadeOut(500, function() {
                                $(this).html('').show(); // Limpia y vuelve a mostrar
                            });
                        }, 900);
                    },
                    error: function(xhr) {
                        $('#resultado').html('<span style="color:red;">' + xhr.responseJSON.error + '</span>');
                    }
                });
            });
        });
    </script> --}}
</div>

@endsection



