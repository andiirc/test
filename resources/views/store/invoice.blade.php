<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">

    <div class="row">

        <div class="col-xs-12">
            <h1>{{ $order->status }}</h1>
            <h3>Numero de orden {{ $order->number_order }}</h3>
            <p>Fecha y hora de la transaccion {{ \Carbon\Carbon::now() }}</p>
            <div>
                <p>cantidad de articulos comprados: {{ count($detail_order) }}</p>
                <p>Costo de los productos: ${{ $order->total }}</p>
                <p>Costo de envio: ${{ $order->sending_value }}</p>
                <p>Total Compra: {{ $order->total + $order->sending_value }} </p>
            </div>
        </div>

        <hr>

        <h1>Productos</h1>
        <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detail_order as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name_product }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
        </table>

    </div>
</div>
</body>
</html>