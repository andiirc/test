<?php

namespace App\Http\Controllers;

use App\Classes\EloquentVueTables;
use App\Entities\Stock;
use App\Http\Resources\Stock as StockResource;
use App\Entities\StockView;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $table = new EloquentVueTables;
        $data = $table->get( new StockView(), ['id', 'name', 'unit_value', 'lot', 'quantity', 'value_item'] );
        return response()->json($data);
    }

    public function store(Request $request){
        $stock = Stock::create([
            'lot'=> $request->input('lot'),
            'due_date' => $request->input('due_date'),
            'quantity' => $request->input('quantity'),
            'product_id'=> $request->input('product_id')
        ]);

        if($stock->exists){
            return new StockResource($stock);
        }
    }

}
