@extends('layouts.app')

@section('template_title')
    Visitantes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Visitantes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('visitantes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombre</th>
									<th >Apellido Materno</th>
									<th >Apellido Paterno</th>
									<th >Motivo</th>
									<th >Genero</th>
									<th >Menor</th>
									<th >Identificacion</th>
									<th >Code Qr</th>
									<th >Reactivacion</th>
									<th >Fechas Impresion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitantes as $visitante)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $visitante->nombre }}</td>
										<td >{{ $visitante->apellido_materno }}</td>
										<td >{{ $visitante->apellido_paterno }}</td>
										<td >{{ $visitante->motivo }}</td>
										<td >{{ $visitante->genero }}</td>
										<td >{{ $visitante->menor }}</td>
										<td >{{ $visitante->identificacion }}</td>
										<td >{{ $visitante->code_qr }}</td>
										<td >{{ $visitante->reactivacion }}</td>
										<td >{{ $visitante->fechas_impresion }}</td>

                                            <td>
                                                <form action="{{ route('visitantes.destroy', $visitante->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('visitantes.show', $visitante->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('visitantes.edit', $visitante->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $visitantes->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
