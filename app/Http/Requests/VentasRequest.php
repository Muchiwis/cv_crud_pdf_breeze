<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];
    
        $rules['dni'] = [
            'required',
            'digits:8',
            'numeric',
        ]; 

        $rules['fecha_venta'] = [
            'required',
            'date',
        ]; 

        $rules['cliente'] = [
            'required',
            'min:4',
            'max:250',
            'string',
        ];
        $rules['producto'] = [
            'required',
            'min:4',
            'max:250',
            'string',
        ];
        $rules['cantidad'] = [
            'required',
            'numeric',
        ];
        $rules['precio_unitario'] = [
            'required',
            'numeric',
        ];
        $rules['monto_total'] = [
            'required',
            'numeric',
        ];
        $rules['metodo_pago'] = [
            'required',
            'string',
        ];
        $rules['notas'] = [
            'required',
            'string',
        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'dni.required' => 'El DNI es obligatorio.', 
            'dni.digits' => 'El DNI debe ser de 8 dígitos', 
            'fecha_venta.required' => 'La fecha es obligatorio.', 
            'cliente.required' => 'El nombre es obligatorio.', 
            'cliente.min' => 'El nombre debe tener al menos 4 caracteres.', 
            'cliente.max' => 'El nombre no debe tener más de 100 caracteres.', 
            'producto.required' => 'El campo producto es obligatorio.', 
            'cantidad.required' => 'El campo cantidad es obligatorio.', 
            'cantidad.numerc' => 'El campo cantidad debe ser numérico.', 
            'precio_unitario.required' => 'El campo precio unitario es obligatorio.', 
            'precio_unitario.numerc' => 'El campo precio debe ser numérico.', 
            'monto_total.required' => 'El campo monto total es obligatorio.', 
            'monto_total.numerc' => 'El campo monto total debe ser numérico.', 
            'metodo_pago.required' => 'El campo método de pago es obligatorio.', 
        ];
    }
}
