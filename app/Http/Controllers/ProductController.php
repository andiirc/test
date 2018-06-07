<?php

namespace App\Http\Controllers;

use App\Classes\EloquentVueTables;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product as ProductResource;
use App\Entities\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index() {
        $table = new EloquentVueTables;
        $data = $table->get( new Product, ['id', 'name', 'unit_value'] );

        return response()->json($data);
        //return ProductResource::collection($data);
    }

    public function search($name){

        $products = Product::where('name', 'LIKE', "%{$name}%")->get();
        return ProductResource::collection($products);

    }

    public function store(ProductRequest $request){

        $product = Product::create([
            'name' => $request->input('name'),
            'unit_value' => $request->input('unit_value')
        ]);

        if($product->exists){
            return new ProductResource($product);
        }

    }
}
