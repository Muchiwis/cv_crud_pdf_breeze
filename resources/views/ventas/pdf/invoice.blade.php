<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura de Venta</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #000;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .details {
            margin-bottom: 20px;
        }
        .details table {
            width: 100%;
        }
        .details table td {
            padding: 5px;
        }
        .items {
            margin-bottom: 20px;
        }
        .items table {
            width: 100%;
            border-collapse: collapse;
        }
        .items table, .items th, .items td {
            border: 1px solid #000;
        }
        .items th, .items td {
            padding: 10px;
            text-align: left;
        }
        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Factura de Venta</h1>
            <p>Fecha: {{ $fecha_venta }}</p>
        </div>
        <div class="details">
            <table>
                <tr>
                    <td><strong> DNI: </strong>{{ $dni }}</td>
                    <td><strong> Cliente: </strong>{{ $cliente }}</td>
                </tr>
                <tr>
                    <td><strong>Método de Pago:</strong> {{ $metodo_pago }}</td>
                </tr>
            </table>
        </div>
        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Monto Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $producto }}</td>
                        <td>{{ $cantidad }}</td>
                        <td>{{ $precio_unitario }}</td>
                        <td>{{ $monto_total }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p><strong>Notas:</strong> {{ $notas }}</p>
        </div>
    </div>
</body>
</html>
