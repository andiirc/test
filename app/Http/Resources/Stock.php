<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Stock extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'lote' => (string) $this->lote ,
            'due_date' => $this->due_date ,
            'quantity' => (integer) $this->quantity,
            'product_id' => $this->product_id,
            'created_at' => (string) $this ->created_at ,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
