<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Entities\StockView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function __construct()
    {
        if(!Session::has('purchase')) Session::put('purchase', []);
    }

    public function show()
    {
        $purchases = Session::get('purchase');
        $total = $this->total();
        return view('store.purchase', compact('purchases', 'total'));
    }

    public function attach($name)
    {
        $purchase = Session::get('purchase');
        $product = StockView::where("name", $name)->first();
        $product->number_items = 1;
        $purchase[$product->name] = $product;
        Session::put('purchase', $purchase);

        return redirect()->route('purchase');
    }

    public function delete($name)
    {
        $purchase = Session::get('purchase');
        $product = StockView::where("name", $name)->first();
        unset($purchase[$product->name]);
        Session::put('purchase', $purchase);

        return redirect()->route('purchase');
    }

    public  function trash()
    {
        Session::forget('purchase');
        return redirect()->route('purchase');
    }

    public function total()
    {
        $purchase = Session::get('purchase');
        $total = 0;
        foreach ($purchase as $item){
            $total += $item->value_item * $item->number_items;
        }
        return $total;
    }

    public function detail()
    {
        if(count(Session::get('purchase')) < 1){
            return redirect()->route('products');
        }
        $purchases = Session::get('purchase');
        $total = $this->total();
        //$this->createOrder($total);
        return view('store.detail', compact('purchases', 'total'));
    }

    /*public function createOrder($total){

        Order::create([
            'total'=> $total ,
            'sending_value'=> 6000
        ]);

    }*/

}
