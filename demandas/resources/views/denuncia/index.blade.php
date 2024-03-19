@extends('layouts.app')

@section('template_title')
    Denuncia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Denuncia') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('denuncias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Intern</th>
										<th>Type</th>
										<th>Descripcio</th>
										<th>Archivo</th>
										<th>Testigos</th>
										<th>Updated</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($denuncias as $denuncia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $denuncia->intern }}</td>
											<td>{{ $denuncia->type }}</td>
											<td>{{ $denuncia->descripcio }}</td>
											<td>{{ $denuncia->archivo }}</td>
											<td>{{ $denuncia->testigos }}</td>
											<td>{{ $denuncia->updated }}</td>

                                            <td>
                                                <form action="{{ route('denuncias.destroy',$denuncia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('denuncias.show',$denuncia->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('denuncias.edit',$denuncia->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $denuncias->links() !!}
            </div>
        </div>
    </div>
@endsection
