@extends('layouts.admin')

@section('template_title')
    | Planteles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="text-center">
                            <img src="{{asset('svg/undraw_navigation_0q48.svg')}}" alt="Icon S.A.R." style="width: 25%; padding-top: 20px;">
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
                                        <th >Plantel</th>
                                        <th >Dirección</th>
                                        <th >Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($planteles as $plantele)
                                        <tr>                                            
                                            <td >{{ $plantele->plantel }}</td>
                                            <td >{{ $plantele->direccion }}</td>
                                            <td>
                                                <a href="{{url('plantele',$plantele->id_plantel)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $planteles->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
