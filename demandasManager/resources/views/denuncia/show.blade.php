@extends('dashboard')

@section('template_title')
    {{ $denuncia->name ?? "{{ __('Show') Denuncia" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Denuncia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('denuncias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if($denuncia!==null)
                        <div class="form-group">
                            <strong>
                                @if($denuncia->intern===1)
                                    Denuncia Interna
                                @else
                                    Denuncia Externa
                                @endif
                            </strong>
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $denuncia->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $denuncia->observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
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
                        </div>
                        <div class="form-group">
                            <strong>Descripcio:</strong>
                            {{ $denuncia->descripcio }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $denuncia->archivo }}
                        </div>
                        <div class="form-group">
                            <strong>Testigos:</strong>
                            {{ $denuncia->testigos }}
                        </div>
                        <div class="form-group">
                            <strong>Updated:</strong>
                            {{ $denuncia->updated }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
