<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!--Moore fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kameron&display=swap" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen mb-1">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gradient-to-r from-sky-400 to-sky-700 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            @if(isset($selectedTab))
                <div class="min-h-6">
                    
                                    <ol class="flex justify-center items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                                        <li class="flex items-center  {{ $selectedTab === 'denuncia-form' ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500' }}">
                                            <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border {{ $selectedTab === 'denuncia-form' ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500' }} rounded-full shrink-0 ">
                                                1
                                            </span>
                                            
                                            <a href="{{ route('denuncia.form') }}"> {{__('messages.denuncia')}} </a> <span class="hidden sm:inline-flex sm:ms-2"></span>
                                            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">                                        </svg>
                                        </li>
                                        <li class="flex items-center {{ $selectedTab === 'denuncia-confirm' ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500' }}">
                                            <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border {{ $selectedTab === 'denuncia-confirm' ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500' }} rounded-full shrink-0">
                                                2
                                            </span>
                                            <a href="{{ route('denuncia.confirm') }}">{{__('messages.confirm')}}</a> <span class="hidden sm:inline-flex sm:ms-2"></span>
                                            
                                        </li>
                                        <li class="flex items-center {{ $selectedTab === 'denuncia-password' ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500' }}">
                                            <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border {{ $selectedTab === 'denuncia-password' ? 'border-blue-600 dark:border-blue-500' : 'border-gray-500' }} rounded-full shrink-0">
                                                3
                                            </span>
                                            <a href="{{ route('denuncia.passwordCreate') }}">{{__('messages.password')}}</a>
                                        </li>
                                    </ol>
                </div>
            @endif


            <!-- Page Content -->
            <main class="h-screen">
                @yield('content')   
            </main>
        </div>
    </body>
</html>
