@extends('store.template')

@section('content')
    <div class="container text-center">

        <div class="panel panel-default">
            <div class="panel-heading">Productos Seleccionados</div>

                <div class="panel-body">
                    @if(count($purchases))
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('products') }}" class="btn btn-info pull-left">
                                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                                    Seguir comprando
                                </a>
                                <a href="{{ route('purchase-trash') }}" class="btn btn-danger pull-right">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    Vaciar Carrito
                                </a>
                            </div>
                        </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-border">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->name }}</td>
                                        <td>{{ $purchase->number_items }}</td>
                                        <td>{{ $purchase->unit_value }}</td>
                                        <td>{{ $purchase->number_items * $purchase->unit_value }}</td>
                                        <td>
                                            <a href="{{ route('purchase-delete-item', $purchase->name) }}" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Total compra ${{ $total }} </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('purchase-detail') }}" class="btn btn-success">
                                Confirmar Compra
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                    @else
                        <div class="alert alert-danger">
                            <strong>Sin productos!</strong> No tienes productos agregados a la compra.
                        </div>
                    @endif

                </div>
        </div>

    </div>
@stop