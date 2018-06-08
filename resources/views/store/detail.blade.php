@extends('store.template')

@section('content')
    <div class="container">
        <h1>Compra realizada</h1>
        <div>
            <p>Por total de: {{$total}} cantidad de articulos comprados {{ count($purchases) }}</p>
            <p>Fecha y hora de la transaccion {{ \Carbon\Carbon::now() }}</p>
            <a href="{{ route('purchase-finalized') }}" class="btn btn-success">Finalizar Compra</a>
        </div>
    </div>
@stop