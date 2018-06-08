<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total','sending_value'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
