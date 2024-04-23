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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        
    <div class="bg-green-900 text-white py-4 px-6 text-center">
        <h1 class="text-4xl font-bold">District Good Governance Index</h1>
        <h2 class="justify-center">(Kullu, Himachal Pradesh)</h2>
    </div>    
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>
        @livewireScripts
        <footer class="flex flex-row flex-wrap items-center justify-center w-full py-6 text-center border-t gap-y-6 gap-x-12 border-blue-gray-50 md:justify-between bg-black text-white">
            <p class="block font-sans text-base antialiased font-normal leading-relaxed text-center">
                © Developed By NIC Kullu
            </p>  
        </footer>


    </body>
</html>
