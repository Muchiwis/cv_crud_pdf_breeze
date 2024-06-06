<?php

namespace Database\Seeders;

use App\Models\Ventas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 5 ventas de ejemplo
        for ($i = 1; $i <= 15; $i++) {
            $venta = Ventas::create([
                'fecha_venta' => now(),
                'dni' => rand(10000000, 99999999), // Generar un DNI aleatorio
                'cliente' => 'Cliente Ejemplo ' . $i,
                'producto' => 'Producto de Ejemplo ' . $i,
                'cantidad' => rand(1, 10),
                'precio_unitario' => rand(50, 200),
                'monto_total' => rand(500, 2000),
                'metodo_pago' => 'Efectivo',
                'notas' => 'Venta de ejemplo ' . $i,
                'uri_pdf' => 'vnt_' . $i . '.pdf' // Nombre del PDF
            ]);

            // Directorio donde se guardan los PDFs
            $directory = 'pdf_ventas';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory, 0755, true);
            }

            // Generar y guardar el PDF
            $ventaArray = $venta->toArray();
            $pdf = Pdf::loadView('ventas.pdf.invoice', $ventaArray);
            $pdf->save(storage_path('app/' . $directory . '/vnt_' . $i . '.pdf'));
        }
    }
}
