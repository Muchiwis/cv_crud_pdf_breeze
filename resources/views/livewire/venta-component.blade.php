<div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" wire:model.live="cantidad" value="{{ isset($venta) ? $venta->cantidad : old('cantidad') }}">
                @if ($errors->has('cantidad'))
                    <br><span class="text-danger error-descripcion">{{ $errors->first('cantidad') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="precio_unitario" class="form-label">Precio unitario</label>
                <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" wire:model.live="precio_unitario" value="{{ isset($venta) ? $venta->precio_unitario : old('precio_unitario') }}">
                @if ($errors->has('precio_unitario'))
                    <br><span class="text-danger error-descripcion">{{ $errors->first('precio_unitario') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="monto_total" class="form-label">Monto total</label>
                <input type="number" class="form-control" id="monto_total" name="monto_total" wire:model.live="monto_total" value="{{ isset($venta) ? $venta->monto_total : old('monto_total') }}" readonly>
                @if ($errors->has('monto_total'))
                    <br><span class="text-danger error-descripcion">{{ $errors->first('monto_total') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
