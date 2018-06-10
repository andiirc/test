<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['number_order','total','sending_value','status'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
