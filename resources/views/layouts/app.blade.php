<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KJSCN Learning Platform') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="../path/to/flowbite/dist/datepicker.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased overflow-hidden">
    @if (Auth::check())
    @role('admin')
    <div class="min-h-screen bg-gray-800">
        @include('layouts.navigation')
        <div class="min-h-full flex flex-row justify-center">
            <!-- Page Heading -->
            @include('layouts.sidebar')
            <!-- Page Content -->
            <main style="overflow-y: auto; height: 90vh; float:right; width: 100%">
                {{ $slot }}
            </main>
        </div>
    </div>
    @else
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <div class="min-h-full flex flex-row justify-center">
            <!-- Page Heading -->
            @include('layouts.sidebar')
            <!-- Page Content -->
            <main style="overflow-y: auto; height: 90vh; float:right; width: 100%">
                {{ $slot }}
            </main>
        </div>
    </div>
    @endrole
    @else
    <?php
            return redirect()->route('login');
        ?>
    @endif
</body>




</html>