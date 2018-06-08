<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['price','quantity', 'order_id', 'stock_id'];
}
