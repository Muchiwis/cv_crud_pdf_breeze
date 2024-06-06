
<div>
    <div class="card">
        <div class="card-header">
            <div class="mb-3">
                {{-- Icono de buscador insertar --}}
                <input wire:model.live="search" type="text" class="form-control" id="" placeholder="Ingrese su nombre">
            </div>
        </div>
        @if ($ventas->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless table-primary align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>DNI</th>
                                <th>Cliente</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Uni.</th>
                                <th>Total.</th>
                                <th>Fecha</th>
                                <th>Pago</th>
                                @can('ventas.home.create')
                                    <th>Opción</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($ventas as $venta)
                            <tr class="table-secondary">
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->dni }}</td>
                                <td>{{ $venta->cliente }}</td>
                                <td>{{ $venta->producto }}</td>
                                <td>{{ $venta->cantidad }}</td>
                                <td>{{ $venta->precio_unitario }}</td>
                                <td>{{ $venta->monto_total }}</td>
                                <td>{{ $venta->fecha_venta }}</td>
                                <td>{{ $venta->metodo_pago }}</td>
                                @can('ventas.home.create')
                                    <td>
                                        <a href="{{ route('ventas.download', ['id' => $venta->id]) }}" class="btn btn-warning">Pdf</a>
                                        <a href="{{ route('ventas.create', ['id' => $venta->id]) }}" class="btn btn-success">Editar</a>
                                        <a href="{{ route('ventas.delete', ['id' => $venta->id]) }}" class="btn btn-danger">Eliminar</a>
                                    </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $ventas->links() }}
            </div>
        @else
            <div class="card-footer">
                <strong>No hay registros</strong>
            </div>
        @endif

    </div>
    
</div>

