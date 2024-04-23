<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('DGGI') }}
        </h2>
    </x-slot> -->
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-green-900 leading-tight">
            {{ __('DGGI') }}
        </h2>
        <h3 class="font-semibold text-xl text-green-900 leading-tight">
            (Himachal Pradesh)
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
