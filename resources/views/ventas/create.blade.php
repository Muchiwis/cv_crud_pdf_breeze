<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ isset($venta) ? 'Editar venta' : 'Nuevo venta' }}</h2>
                            </div>
                            <form action="{{ isset($venta) ? route('ventas.update', $venta->id) : route('ventas.store') }}" method="POST">
                                @csrf
                                @if (isset($venta))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                        <div class="col-md-12">
                                            
                                            <div class="row">
                                                <div class="col-md-4">   
                                                    <div class="mb-3">
                                                        <label for="dni" class="form-label">DNI</label>
                                                        <input type="number" class="form-control" id="dni" name="dni" value="{{ (isset($venta)) ? $venta->dni : old('dni') }}" >
                                                        @if ($errors->has('dni'))
                                                            <br><span class="text-danger error-descripcion">{{ $errors->first('dni') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">   
                                                    <div class="mb-3">
                                                        <label for="cliente" class="form-label">Nombre Cliente</label>
                                                        <input type="text" class="form-control" id="cliente" name="cliente" value="{{ (isset($venta)) ? $venta->cliente : old('cliente') }}" >
                                                        @if ($errors->has('cliente'))
                                                            <br><span class="text-danger error-descripcion">{{ $errors->first('cliente') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="producto" class="form-label">Producto</label>
                                                        <input type="text" class="form-control" id="producto" name="producto" value="{{ (isset($venta)) ? $venta->producto : old('producto') }}" >
                                                        @if ($errors->has('producto'))
                                                            <br><span class="text-danger error-descripcion">{{ $errors->first('producto') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            @if (isset($venta))
                                                @livewire('venta-component', ['venta' => $venta])
                                            @else
                                                @livewire('venta-component')
                                            @endif
                                        
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="fecha_venta" class="form-label">Fecha de venta</label>
                                                        <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" value="{{ isset($venta) ? $venta->fecha_venta : old('fecha_venta') }}">
                                                        @if ($errors->has('fecha_venta'))
                                                            <br><span class="text-danger error-descripcion">{{ $errors->first('fecha_venta') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="metodo_pago" class="form-label">Método de pago</label>
                                                        <select class="form-select" id="metodo_pago" name="metodo_pago">
                                                            @if (isset($venta))
                                                            <option value="{{ $venta->metodo_pago }}">{{ $venta->metodo_pago }}</option>
                                                            <option value="efectivo">Efectivo</option>
                                                            <option value="tarjeta_debito_credito">Tarjeta de Débito/Crédito:</option>
                                                            <option value="yape">Yape</option>
                                                            <option value="transferencia_bancaria">Transferencia bancaria</option>
                                                            @else
                                                                <option value="0">Seleccione: </option>        <option value="efectivo">Efectivo</option>
                                                        
                                                                <option value="tarjeta_debito_credito">Tarjeta de Débito/Crédito:</option>
                                                                <option value="yape">Yape</option>
                                                                <option value="transferencia_bancaria">Transferencia bancaria</option>
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('metodo_pago'))
                                                            <br><span class="text-danger error-descripcion">{{ $errors->first('metodo_pago') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="notas" class="form-label">Notas</label>
                                                        <input type="text" class="form-control" id="notas" name="notas" value="{{ (isset($venta)) ? $venta->notas : old('notas') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="d-block text-end card-footer">
                                    <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>