<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    @section('content')
                    @if ($denuncia)
                        <div class="bg-gray-200">
                            <p class="text-lg font-semibold mb-4  text-center">{{trans('messages.information')}}</p>
                        </div>
                        <div id="dashboardContent" class="flex lg:flex-row">
                                <a href="{{ url('/export-to-pdf') }}" class="w-2/12 m-4 h-24 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm  py-2.5 text-center mt-12"><img id="svg" src="{{ asset('images/pdf-svgrepo-com.svg') }}" alt="Mi Foto"><span class="overflow-hidden">{{__('messages.exportPDF')}}</span></a>
                                <div class="complaint card-body text-xl p-6 rounded-md shadow-md flex flex-col items-center  m-4 h-100 w-4/12">
                                    <div id="mainInfo" class="w-6/12 form-group flex flex-row">
                                        <strong class="text-2xl">{{trans('messages.complaintId')}} {{ $denuncia->id }}</strong>
                                        @php
                                            $status = \App\Models\Status::find($denuncia->estado);
                                            $backgroundColor = ($status && $status->id == 4) ? 'bg-red-500' :
                                                (($status && $status->id == 3) ? 'bg-green-500' :
                                                (($status && $status->id == 2) ? 'bg-blue-500' :
                                                'bg-gray-500'));
                                        @endphp
                                        <div class="{{$backgroundColor}} lg:ml-10  p-2 text-center rounded-md shadow-mds">
                                            <strong class="text-white ">
                                               
                                                {{
                                                    $status ? $status->name : 'Sin estado asignado'
                                                }}
                                            </strong>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group w-6/12">
                                        <strong class="">{{ __('messages.updated') }}</strong>
                                        {{ $denuncia->updated }}
                                    </div>
                                    <hr>
                                    <div class="form-group w-6/12">
                                        @if($denuncia->intern === 1)
                                            <strong>La denuncia es interna</strong>
                                        @else
                                            <strong>La denuncia es externa</strong>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="form-group w-6/12">
                                        <strong class="">{{ __('messages.complainType') }}</strong>
                                        @switch($denuncia->type)
                                            @case('acoso')
                                                {{ __('messages.harassment') }}
                                                @break
                                            @case('industry')
                                                {{ __('messages.industry') }}
                                                @break
                                            @case('competence')
                                                {{ __('messages.competence') }}
                                                @break
                                            @case('hacienda')
                                                {{ __('messages.grants') }}
                                                @break
                                            @case('integrity')
                                                {{ __('messages.humanRights') }}
                                                @break
                                            @case('bribery')
                                                {{ __('messages.bribery') }}
                                                @break
                                            @case('influence')
                                                {{ __('messages.influence') }}
                                                @break
                                            @case('Interests')
                                                {{ __('messages.interestConflict') }}
                                                @break
                                            @case('hazards')
                                                {{ __('messages.hazards') }}
                                                @break
                                            @case('criminal')
                                                {{ __('messages.penal')}}
                                                @break
                                            @case('administrative')
                                                {{ __('messages.administrative') }}
                                                @break
                                            @default
                                                {{ 'No se ha introducido Tipo de denuncia' }}
                                        @endswitch
                                    </div>
                                    <hr>
                                    <div class="form-group w-6/12">
                                        <strong class="">{{ __('messages.create') }}</strong>
                                        {{ $denuncia->created_at }}
                                    </div>
                                    <hr>
                                    <div class="form-group w-6/12">
                                        <strong class="">{{ __('messages.description') }}</strong>
                                        <span>{{ $denuncia->descripcio }}</span>
                                    </div>
                                    <hr>
                                    <div class="form-group w-6/12">
                                        <strong class="">{{ __('messages.witnesses') }}</strong>
                                        {{ $denuncia->testigos }}
                                    </div>
                                    <hr>                                
                                    @else
                                        <p class="text-lg font-semibold">{{__('messages.noInformationUser')}}</p>
                                    @endif
                                    <div class="w-6/12 mt-20">
                                        <div class="flex flex-col">
                                            <strong class="text-left text-xl">{{__('messages.remarks')}}:</strong>
                                            <span class="text-xl">{{ $denuncia->observaciones }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                        
                        </div>
                    @endsection
                </div>
            </div>
        </div>
    </div>
</x-app-layout>