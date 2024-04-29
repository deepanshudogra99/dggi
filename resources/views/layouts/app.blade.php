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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">       
            <!-- Page Heading -->
            @if (isset($header))
                <div class="bg-gray-250  dark:bg-gray-800 shadow ">
                    <div class="max-w-7xl mx-auto py- px-4 sm:px-6 lg:px-8 text-center">
                        {{ $header }}
                    </div>
                 </div>
            @endif
            @livewire('navigation-menu')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer style="margin-top: 238px" class=" bg-green-900 text-white px-2 py-4 fixed-bottom w-full">
            <div class="container mx-auto text-center">
                <p>Developed By <span class="font-bold">NIC KULLU</span></p>
            </div>
        </footer>
        <!-- <footer class="bg-green-900 text-white px-2 py-4 mt-auto">
        <div class="container mx-auto mt-auto text-center">
            <p>Developed By <span class="font-bold">NIC KULLU</span></p>
        </div>
    </footer> -->
        </div>


        @stack('modals')

        @livewireScripts
    </body>
</html>
