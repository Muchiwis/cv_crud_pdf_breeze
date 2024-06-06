<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    public $table = "ventas"; 
    protected $fillable = [
        'id',
        'fecha_venta',
        'cliente',
        'producto',
        'cantidad',
        'precio_unitario',
        'monto_total',
        'metodo_pago',
        'notas',
        'created_at',
        'updated_at',
        'uri_pdf',
        'dni',
    ];
}
