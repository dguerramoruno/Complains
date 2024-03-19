@extends('layouts.app')

@section('template_title')
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('denuncias.update', $denuncia->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('denuncia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
