@extends('store.template')

@section('content')
    <div class="container">
        <h1>{{ $order->status }}</h1>
        <h3>Numero de orden {{ $order->number_order }}</h3>
        <p>Fecha y hora de la transaccion {{ \Carbon\Carbon::now() }}</p>
        <div>
            <p>Costo de los productos: ${{ $order->total }}</p>
            <p>Costo de envio: ${{ $order->sending_value }}</p>
            <p>Total Compra: {{ $order->total + $order->sending_value }} </p>
            <p>cantidad de articulos comprados: {{ count($detail_order) }}</p>
        </div>
    </div>
@stop