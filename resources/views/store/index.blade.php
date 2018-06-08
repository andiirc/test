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
                        <p class="desc">descripción</p>
                        <div class="rating-wrap">
                            <div class="label-rating">
                                @if($stock->quantity > 0)
                                    <span class="label label-success">Disponible</span>
                                @else
                                    <span class="label label-danger">Agotado</span>
                                @endif

                            </div>

                        </div>
                    </figcaption>
                    <div class="bottom-wrap">
                        <div class="price-wrap h5">
                            <span class="price-new">Precio </span><del class="price-old">${{ $stock->unit_value }}</del>
                        </div>
                        @if($stock->quantity > 0)

                            <form action="{{ route('purchase-attach') }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <label for="quantity">Seleccionar Cantidad</label>
                                <input type="number" name="quantity" min="1" max="{{  $stock->quantity }}" value="{{ $quantity = 1 }}">
                                <input type="hidden" name="name" value="{{ $stock->name}}" >
                                <button class="btn btn-sm btn-primary pull-right" type="submit">
                                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                    Agregar
                                </button>
                            </form>

                        @endif
                    </div>
                </figure>
            </div>
        @endforeach
        </div>
    </div>
@stop
