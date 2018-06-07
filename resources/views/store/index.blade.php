@extends('store.template')

@section('content')
    <div class="container">
        <div class="row">
        @foreach ($stocks as $stock)
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="/img/default.png"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">{{ $stock->name }}</h4>
                        <p class="desc">description</p>
                        <div class="rating-wrap">
                            <div class="label-rating">Cantidad Disponible {{ $stock->quantity }} </div>
                        </div>
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="" class="btn btn-sm btn-primary float-right">Agregar</a>
                        <div class="price-wrap h5">
                            <span class="price-new">Precio </span><del class="price-old">${{ $stock->unit_value }}</del>
                        </div>
                    </div>
                </figure>
            </div>
        @endforeach
        </div>
    </div>
@stop
