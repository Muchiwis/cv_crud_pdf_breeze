<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,800&family=Rubik+Mono+One&family=Titan+One&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('estilos/dashboard.css') }}">
        {{-- <link rel="stylesheet" href="https://cvcrudpdfbreeze-production.up.railway.app/build/assets/app-DoFg4wMr.css">
        
        <link rel="stylesheet" href="https://cvcrudpdfbreeze-production.up.railway.app/build/assets/app-CB61jlRJ.css"> --}}

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
 
        {{-- <script src="https://cvcrudpdfbreeze-production.up.railway.app/build/assets/app-D9_yW7fw.js"></script> --}}
    </body>
</html>
