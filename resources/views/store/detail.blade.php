@extends('store.template')

@section('content')
    <div class="container">
        <h1>{{ $order->status }}</h1>
        <h3>Numero de orden {{ $order->number_order }}</h3>
        <p>Fecha y hora de la transaccion {{ \Carbon\Carbon::now() }}</p>
        <div>
            <p>cantidad de articulos comprados: {{ count($detail_order) }}</p>
            <p>Costo de los productos: ${{ $order->total }}</p>
            <p>Costo de envio: ${{ $order->sending_value }}</p>
            <p>Total Compra: {{ $order->total + $order->sending_value }} </p>
            <a href="{{ route('') }}" class="btn btn-success">Descargar Factura</a>
        </div>
    </div>
@stop