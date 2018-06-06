<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Entities\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){

        return ProductResource::collection(Product::get());

    }


    public function search($name){

        $products = Product::where('name', 'LIKE', "%{$name}%")->get();
        return ProductResource::collection($products);

    }

    public function store(Request $request){

        $product = Product::create([
            'name' => $request->input('name'),
            'unit_value' => $request->input('unit_value')
        ]);

        if($product->exists){
            return new ProductResource($product);
        }

    }
}
