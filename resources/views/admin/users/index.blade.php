<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Lista de usuarios') }}

        </h2>
    </x-slot>
    @livewire('admin.users.index')
</x-app-layout>