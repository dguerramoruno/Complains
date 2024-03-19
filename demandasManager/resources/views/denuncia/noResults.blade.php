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
                            <span class="card-title">Estado 
                                @php
                                    $status = \App\Models\Status::find($estado);
                                @endphp
                                {{
                                    $status ? $status->name : 'Sin estado asignado'
                                }}
                            </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('denuncias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h1>NO HAY DENUNCIAS DE ESTE ESTADO</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
