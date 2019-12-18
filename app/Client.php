<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are not mass assignable.
     * 
     * @var array
     */
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id');
    }
}
