<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro de ventas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="p-6 text-gray-900">
                    @can('ventas.home.create')
                        <a href="{{ route('ventas.create', ['id' => 0]) }}" class="btn btn-primary mb-3">Nuevo Registro</a>
                        @livewire('table-component')
                    @endcan
                    @livewire('table-component')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>