<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }
}
