<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="dashboard-container">
                        <div class="welcome-message">
                            <h3 class="home-dashboard">Bienvenido a </h3>
                            <h1 class="home-dashboard">HogarTec</h1>
                            <a href="{{ route('ventas.index') }}" class="btn btn-warning enlace">Ir a ventas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
