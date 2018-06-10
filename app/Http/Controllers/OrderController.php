<?php

namespace App\Http\Controllers;

use App\Classes\EloquentVueTables;
use App\Entities\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $table = new EloquentVueTables;
        $data = $table->get( new Order(), ['id','number_order','total','sending_value','status']);
        return response()->json($data);
    }
}
