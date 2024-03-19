@extends('layouts.app')

@section('template_title')
{{ __('Create') }} Denuncia
@endsection

@section('content')
<section class="content container-fluid h-full	">
    <div class="row h-full	">
        <div class="h-full	">

            @includeif('partials.errors')

            <div class="card card-default h-full">
                <div class="card-body h-full">
                    <form method="POST" action="{{ route('denuncia.form') }}" role="form" enctype="multipart/form-data" class="h-full	">
                        @csrf
                        @include('denuncia.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection