<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';

    protected $fillable = [ 'lot', 'due_date', 'quantity', 'product_id' ];
}
