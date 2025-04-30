@extends('layouts.app')

@section('template_title')
    Trabajadores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Trabajadores') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('trabajadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Genero</th>
									<th >Id Plantel</th>
									<th >Id Puesto</th>
									<th >Estado</th>
									<th >Fotografia</th>
									<th >Code Qr</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trabajadores as $trabajadore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $trabajadore->nombre }}</td>
										<td >{{ $trabajadore->apellido_materno }}</td>
										<td >{{ $trabajadore->apellido_paterno }}</td>
										<td >{{ $trabajadore->genero }}</td>
										<td >{{ $trabajadore->id_plantel }}</td>
										<td >{{ $trabajadore->id_puesto }}</td>
										<td >{{ $trabajadore->estado }}</td>
										<td >{{ $trabajadore->fotografia }}</td>
										<td >{{ $trabajadore->code_qr }}</td>

                                            <td>
                                                <form action="{{ route('trabajadores.destroy', $trabajadore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('trabajadores.show', $trabajadore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('trabajadores.edit', $trabajadore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $trabajadores->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
