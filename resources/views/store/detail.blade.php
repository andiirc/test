@extends('store.template')

@section('content')
    <div class="container">
        <h1>Compra realizada</h1>
            <div>
                Por total de: {{$total}} cantidad de articulos comprados {{ count($purchases) }}
            </div>
    </div>
@stop