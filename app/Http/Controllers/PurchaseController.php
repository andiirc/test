<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Entities\OrderItem;
use App\Entities\Stock;
use App\Entities\StockView;
use Carbon\Carbon;
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

    public function attach(Request $request)
    {
        $purchase = Session::get('purchase');
        $product = StockView::where("name", $request->input('name'))->first();
        if($request->input('quantity') > $product->quantity ){
            $request->session()->flash('errors', 'la cantidad que esta seleccionando del producto');
            return redirect()->route('products');
        }else{
            $product->number_items = $request->input('quantity');
            $purchase[$product->name] = $product;
            Session::put('purchase', $purchase);
            return redirect()->route('purchase');
        }
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
            $total += $item->unit_value * $item->number_items;
        }
        return $total;
    }

    public function finished()
    {
        if(count(Session::get('purchase')) < 1){
            return redirect()->route('products');
        }
        $purchases = Session::get('purchase');
        $total = $this->total();
        $order = $this->createOrder($total, $purchases);
        $detail_order = OrderItem::where('order_id','=',$order->id)->get();
        Session::forget('purchase');

        return view('store.detail', compact('order','detail_order'));
    }

    public function createOrder($total, $purchases)
    {

        $date = Carbon::now()->format('YmdHis');
        $code = rand(0, 100000);
        $number_format = "{$code}-{$date}";

        $order = Order::create([
            'number_order' => $number_format,
            'total'=> $total ,
            'sending_value'=> 6000,
            'status'=> 'Compra Exitosa'
        ]);

        foreach ($purchases as $purchase){
            $order->orderItems()->create([
                'price'=> $purchase->unit_value,
                'quantity'=> $purchase->number_items,
                'stock_id'=> $purchase->stock_id
            ]);

            Stock::where('id','=', $purchase->stock_id)->update(['quantity'=> $purchase->quantity - $purchase->number_items]);
        }

        return $order;

    }
}
