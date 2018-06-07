<?php

namespace App\Http\Controllers;

use App\Entities\StockView;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $folderView = 'store';

    public function index()
    {
        $stocks = StockView::all();
        return view("{$this->folderView}.index", compact('stocks'));
    }
}
