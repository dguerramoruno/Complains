@extends('layouts.app')

@section('template_title')
    Confirmar Denuncia
@endsection

@section('content')
<div class="flex flex-col justify-center">
    <div class="font-bold  text-center text-xl mb-12">
        <h3>{{trans('messages.checkData')}}</h3>
    </div>

                    <div class="grid place-content-center">
                        <div class="form-group">
                            <h3>{{trans('messages.expNum')}}</h3>
                            <strong>{{$denuncia->id}}</strong>
                        </div>
                        <div class="form-group">
                            @if($denuncia->intern ===1)
                                <strong>La denuncia es interna</strong>
                            @else
                                <strong>La denuncia es externa</strong>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>{{trans('messages.complainType')}}</strong>
                            @switch($denuncia->type)
                                        @case('acoso')
                                            {{ trans('messages.harassment')}}
                                            @break
                                        @case('industry')
                                            {{ trans('messages.industry') }}
                                            @break
                                        @case('competence')
                                            {{ trans('messages.competence') }}
                                            @break
                                        @case('hacienda')
                                            {{ trans('messages.grants') }}
                                            @break
                                        @case('integrity')
                                            {{ trans('messages.humanRights') }}
                                            @break
                                        @case('bribery')
                                            {{ trans('messages.bribery') }}
                                            @break
                                        @case('influence')
                                            {{ trans('messages.influence') }}
                                            @break
                                        @case('Interests')
                                            {{ trans('messages.interestConflict') }}
                                            @break
                                        @case('hazards')
                                            {{ trans('messages.hazards') }}
                                            @break
                                        @case('criminal')
                                            {{ trans('messages.penal') }}
                                            @break
                                        @case('administrative')
                                            {{ trans('messages.administrative') }}
                                            @break
                                        @default
                                            {{ 'No se ha introducido Tipo de denuncia' }}
                            @endswitch
                        </div>
                        <div class="form-group">
                            <strong>{{trans('messages.description')}}</strong>
                            {{ $denuncia->descripcio }}
                        </div>
                        <div class="form-group">
                            <strong>{{trans('messages.witnesses')}}</strong>
                            {{ $denuncia->testigos }}
                        </div>
                        <div class="form-group mb-4">
                            <strong>{{trans('messages.updated')}}</strong>
                            {{ $denuncia->updated }}
                        </div>
                        <div class="flex justify-center">
                            <a href="{{route('denuncia.edit', ['id' => $denuncia->id]) }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Atras</a>
                            <a href="{{route('denuncia.passwordCreate')}}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" >Siguiente</a>
                        <div>
                    </div>
</div>
@endsection