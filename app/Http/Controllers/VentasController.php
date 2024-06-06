<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentasRequest;
use App\Models\User;
use App\Models\Ventas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Object_;

class VentasController extends Controller
{
    public function index()
    {
        return view('ventas.index');
    }

    public function create($id)
    {
        $venta = Ventas::find($id);
        // dd($venta);
        return view('ventas.create', compact('venta'));
    }

    public function downloadPDF($id){
        $venta_id = Ventas::find($id);
        $nombre_descarga = $venta_id->cliente."_".$venta_id->uri_pdf;

        $file = storage_path('app/pdf_ventas/'.$venta_id->uri_pdf);
        if (file_exists($file)) {
            //$randomString = uniqid();
            $randomString = time();
            $nombre_descarga = $randomString.'?'.$nombre_descarga;
            return response()->download($file, $nombre_descarga);
        } else {
            abort(404, 'El archivo no existe.');
        }
    }

    public function store(VentasRequest $request)
    {
        //dd($request->all());
        // echo "pasaste la validacion";
        // die;
        try {
            $name_pdf = "vnt_".$request->dni.".pdf";
            $venta = Ventas::create([
                'fecha_venta' => $request->fecha_venta,
                'dni' => $request->dni,
                'cliente' => $request->cliente,
                'producto' => $request->producto,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $request->precio_unitario,
                'monto_total' => $request->monto_total,
                'metodo_pago' => $request->metodo_pago,
                'notas' => $request->notas,
                'uri_pdf' => $name_pdf
            ]);
            
            $directory = 'pdf_ventas';
            if (!Storage::exists($directory)) { 
                Storage::makeDirectory($directory, 0755, true); 
            }
            $ventaArray = $venta->toArray();
            // Generar el PDF
            $pdf = Pdf::loadView('ventas.pdf.invoice', $ventaArray);
            $pdf->save(storage_path('app/' . $directory . '/' . $name_pdf));

            return redirect()->route('ventas.index')->with('message',"Registrado correctamente");
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al registrar', 'error' => $th->getMessage()], 500);
        }
        
    }

    public function update(Request $request, string $id)
    {
        try {
            $name_pdf = "vnt_".$request->dni.".pdf";
            $venta_actualizado = Ventas::find($id);
            $name_pdf_antes = $venta_actualizado->uri_pdf;
            $venta_actualizado->update([
                'fecha_venta' => $request->fecha_venta,
                'dni' => $request->dni,
                'cliente' => $request->cliente,
                'producto' => $request->producto,
                'cantidad' => $request->cantidad,
                'precio_unitario' => $request->precio_unitario,
                'monto_total' => $request->monto_total,
                'metodo_pago' => $request->metodo_pago,
                'notas' => $request->notas,
                'uri_pdf' => $name_pdf
            ]);
           
            $directory = 'pdf_ventas';
            $file = storage_path('app/' . $directory . '/' . $name_pdf_antes);
            $ventaArray = $venta_actualizado->toArray();
            if (file_exists($file)) {
                // Eliminar el archivo existente
                Storage::delete($directory . '/' . $name_pdf_antes);
    
                // Crear directorio si no existe
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory, 0755, true); 
                }
    
                $pdf = Pdf::loadView('ventas.pdf.invoice', $ventaArray);
                $pdf->save(storage_path('app/' . $directory . '/' . $name_pdf));
            } else {
                abort(404, 'El archivo no existe.');
            }

            return redirect()->route('ventas.index')->with('message','Actualizado correctamente');
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error al actualizar', 'error' => $th->getMessage()], 500);
        }
        
    }

    public function destroy(string $id)
    {
        $venta_delete = Ventas::find($id);
        $directory = 'pdf_ventas';
        $fileName = $venta_delete->uri_pdf;
        $file = storage_path('app/' . $directory . '/' . $fileName);
    
        if (file_exists($file)) {
            Storage::delete($directory . '/' . $fileName);
        }
        $venta_delete->delete();

        return redirect()->route('ventas.index')->with('message',"Eliminado correctamente");
    }
}
