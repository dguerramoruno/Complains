@extends('dashboard')

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

                             
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form action="{{ url('/denuncias/filtrar') }}" method="get" class="d-flex flex-col justify-content-end align-content-center overflow-scroll	">
                        @php
                            $status = \App\Models\Status::All();
                        @endphp
                        <div class="d-flex justify-content-end overflow-scroll	 ">
                            <div class="form-group d-flex flex-column m-4">
                                {{ Form::label('estado') }}
                                {{ Form::select('estado', $status->pluck('name', 'id'), ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un estado']) }}
                                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}                            
                            </div>
                            <div class="form-group m-4">
                                {{ Form::label('created_at', 'Fecha de inicio') }}
                                {{ Form::date('created_at', \Carbon\Carbon::now()->subDays(7), ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : '')]) }}
                            </div>

                            <div class="form-group m-4">
                                {{ Form::label('final_date', 'Fecha de fin') }}
                                {{ Form::date('final_date', \Carbon\Carbon::now()->subDays(7), ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : '')]) }}
                            </div>
                        </div>
                        <button type="submit" class="m-5 h-25 text-end bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Filtrar</button>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover data-table table table-striped table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Intern</th>
										<th>Estado</th>
										<th>Observaciones</th>
										<th>Tipo</th>
										<th>Descripcio</th>
										<th>Archivo</th>
										<th>Testigos</th>
										<th>Actualizado</th>
                                        <th>Creada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($denuncias !==null)
                                    @foreach ($denuncias as $denuncia)
                                        <tr>
                                            <td>{{$denuncia->id}}</td>
                                            
											<td>
                                                @if($denuncia->intern===1)
                                                    Denuncia Interna
                                                @else
                                                    Denuncia Externa
                                                @endif
                                            </td>
											<td style="background-color: {{ $denuncia->estado == 5 ? '#ff593d' : 'transparent' }}">
                                                @php
                                                    $status = \App\Models\Status::find($denuncia->estado);
                                                @endphp
                                                {{
                                                    $status ? $status->name : 'Sin estado asignado'
                                                }}
                                            </td>
											<td>{{ $denuncia->observaciones }}</td>
											<td>
                                                @switch($denuncia->type)
                                                    @case('acoso')
                                                        {{ 'Acoso laboral o sexual' }}
                                                        @break
                                                    @case('industry')
                                                        {{ 'Propiedad Industrial o intelectual' }}
                                                        @break
                                                    @case('competence')
                                                        {{ 'Libre Competencia' }}
                                                        @break
                                                    @case('hacienda')
                                                        {{ 'Subvenciones, Hacienda Pública o Seguridad Social' }}
                                                        @break
                                                    @case('integrity')
                                                        {{ 'Integridad Moral o de los Derechos Humanos' }}
                                                        @break
                                                    @case('bribery')
                                                        {{ 'Cohecho' }}
                                                        @break
                                                    @case('influence')
                                                        {{ 'Tráfico de Influencias' }}
                                                        @break
                                                    @case('Interests')
                                                        {{ 'Conflicto de Intereses' }}
                                                        @break
                                                    @case('hazards')
                                                        {{ 'Riesgos Laborales' }}
                                                        @break
                                                    @case('criminal')
                                                        {{ 'Otras Infracciones Penales' }}
                                                        @break
                                                    @case('administrative')
                                                        {{ 'Otras Infracciones Administrativas Graves o Muy Graves' }}
                                                        @break
                                                    @default
                                                        {{ 'No se ha introducido Tipo de denuncia' }}
                                                @endswitch
                                            </td>
											<td class="overflow-x-clip">{{ $denuncia->descripcio }}</td>
                                            <td>
											@if ($denuncia->archivo)
                                            <a href="http://localhost:8000/storage/{{$denuncia->archivo}}" class="btn btn-primary">Descargar Archivo</a>                                                
                                            @else
                                                <p>No existe archivo.</p>
                                            @endif
                                            </td>
											<td>{{ $denuncia->testigos }}</td>
											<td>{{ $denuncia->updated }}</td>
                                            <td>{{ $denuncia->created_at }}</td>
                                            <td>
                                                <form action="{{ route('denuncias.destroy',$denuncia->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('denuncias.show',$denuncia->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('denuncias.edit',$denuncia->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
