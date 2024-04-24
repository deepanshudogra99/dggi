<x-app-layout>  
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-green-900 leading-tight">
            {{ __('DGGI') }}
        </h2>
        <h3 class="font-semibold text-xl text-green-900 leading-tight">
            (Himachal Pradesh)
        </h3>
    </x-slot>
    @livewire('masters.state-master')
</x-app-layout>
