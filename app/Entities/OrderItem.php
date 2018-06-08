<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['price','quantity', 'stock_id', 'order_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
