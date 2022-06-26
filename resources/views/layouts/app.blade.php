<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-light gray-light">
        <div class="container mx-auto min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white">
                <div class="py-6 flex justify-between items-end">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="py-4">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
