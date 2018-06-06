<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource
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
            'name' => (string) $this->name ,
            'unit_value' => (integer) $this->unit_value ,
            'created_at' => (string) $this ->created_at ,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
