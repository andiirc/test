<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [ 'name', 'unit_value' ];

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
}
