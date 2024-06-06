<?php

namespace App\Livewire;

use Livewire\Component;

class VentaComponent extends Component
{
    public $cantidad;
    public $precio_unitario;
    public $monto_total;

    protected $rules = [
        'cantidad' => 'required|numeric|min:1',
        'precio_unitario' => 'required|numeric|min:0',
    ];

    protected $messages = [
        'cantidad.required' => 'La cantidad es obligatoria.',
        'cantidad.numeric' => 'La cantidad debe ser un número.',
        'cantidad.min' => 'La cantidad debe ser al menos 1.',
        'precio_unitario.required' => 'El precio unitario es obligatorio.',
        'precio_unitario.numeric' => 'El precio unitario debe ser un número.',
        'precio_unitario.min' => 'El precio unitario debe ser al menos 0.',
    ];

    public function mount($venta = null)
    {
        if ($venta) {
            $this->cantidad = $venta->cantidad;
            $this->precio_unitario = $venta->precio_unitario;
            $this->monto_total = $venta->monto_total;
           
        }
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if (is_numeric($this->cantidad) && is_numeric($this->precio_unitario)) {
            $this->monto_total = $this->cantidad * $this->precio_unitario;
        } else {
            $this->monto_total = null; 
        }
    }

    public function render()
    {
        return view('livewire.venta-component');
    }
}
