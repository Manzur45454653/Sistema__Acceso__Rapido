@extends('layouts.admin')

@section('template_title')
    | Visitantes
@endsection

@section('content')

    <div class="content" style="margin-left: 30px">

        {{-- Solo se muestre la alerta cuando existe un error MANERA 2--}}
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{$error}}</li>
            </div>
        @endforeach

        <dov class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                  <div class="card-header">
                        <div class="text-center">
                            <img src="{{asset('svg/undraw_personal-info_yzls.svg')}}" alt="Icon S.A.R."style="width: 40%">
                        </div>
                    
                    <div class="card-tools">
                        <a href="{{ route('visitante.create') }}" class="btn btn-primary">
                            <i class="bi bi-file-plus"></i> Agregar nuevo visitante
                        </a>                        
                    </div>
                </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: block;">


                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="col-md-3">Nombre</th>
                                <th>Motivo</th>
                                <th style="width: 100px;" class="text-center">Fecha</th>
                                <th style="width: 70px;" class="text-center">Acción</th>
                            </tr>
                        </thead>

                        <tbody>

                            {{-- Imprimimos una consulta desde el modelo, clasico for para recorrer a información de la DB --}}
                            @foreach ($visitantes as $visitante)
                            <tr>
                                <td>{{ $visitante->nombre." ".$visitante->apellido_materno." ". $visitante->apellido_paterno }}</td>
                                <td class="justify">{{ $visitante->motivo }}</td>
                                <td class="text-center">{{ $visitante->created_at->format('h:i A') }}</td>
                                <td class="text-center">
                                    <a href="{{url('visitante',$visitante->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                      </table>
                    <!-- Page specific script -->
                    <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Visitantes",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Visitantes",
                                    "infoFiltered": "(Filtrado de _MAX_ total Visitantes)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Visitantes",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>            
        </dov>
    </div>
@endsection


