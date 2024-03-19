<!-- resources/views/crear-usuario.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="flex justify-center align-middle">
        <form method="post" action="{{ route('usuarios.store') }}" class="flex flex-col">
            @csrf

            <input type="hidden" name="denuncia_id" value="{{ $denuncia->id }}">

            <label for="password">{{trans('messages.password')}}</label>
            <input type="password" name="password" required>

            <label for="password_confirmation">{{trans('messages.password_confirmation')}}</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mt-6 mb-2">Crear Usuario</button>

        </form>
    </div>
@endsection